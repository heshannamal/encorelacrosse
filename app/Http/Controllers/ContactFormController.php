<?php

namespace App\Http\Controllers;

use App\Mail\ContactSubmissionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:60'],
            'message' => ['nullable', 'string', 'max:5000'],
            'source' => ['nullable', 'string', 'max:160'],
            'website' => ['nullable', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('contact_error', $validator->errors()->first());
        }

        $data = $validator->validated();

        // Simple honeypot: silently accept bot submissions without sending mail.
        if (!empty($data['website'])) {
            return back()->with('contact_success', 'Thank you. Your message has been submitted.');
        }

        $receiver = trim((string) config('mail.contact_receiver'));

        if ($receiver === '') {
            Log::error('Contact form receiver is not configured.');

            return back()
                ->withInput()
                ->with('contact_error', 'The contact form is temporarily unavailable. Please try again later.');
        }

        $data['source'] = trim((string) ($data['source'] ?? 'Website inquiry'));
        $data['source'] = $data['source'] !== '' ? $data['source'] : 'Website inquiry';
        $data['page_url'] = (string) ($request->headers->get('referer') ?: url()->previous());
        $data['submitted_at'] = now()->format('Y-m-d H:i:s T');

        try {
            Mail::mailer('custom_smtp')
                ->to($receiver)
                ->send(new ContactSubmissionMail($data));

            return back()->with(
                'contact_success',
                'Thank you. Your message has been sent successfully.'
            );
        } catch (Throwable $e) {
            Log::error('Encore website contact email failed.', [
                'source' => $data['source'],
                'email' => $data['email'],
                'message' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->with(
                    'contact_error',
                    'We could not send your message right now. Please try again.'
                );
        }
    }
}
