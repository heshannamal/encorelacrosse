<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

/**
 * Detect case mismatches which work on Windows but return 404 on Linux.
 */
class LocalCountryAndEventImagesTest extends TestCase
{
    public function test_country_pages_and_kings_showcase_reference_real_case_correct_images(): void
    {
        $root = dirname(__DIR__, 2);
        $views = glob($root.'/resources/views/international/*.blade.php');
        $views[] = $root.'/resources/views/events/kingsShowcase.blade.php';
        $this->assertNotEmpty($views);
        $errors = [];

        foreach ($views as $view) {
            $contents = file_get_contents($view);
            preg_match_all(
                '~asset\(\s*["\x27](images/[^"\x27]+\.(?:jpe?g|png|webp|avif|gif|svg))["\x27]\s*\)~i',
                $contents,
                $matches
            );

            foreach ($matches[1] as $image) {
                $directory = $root.'/public';
                foreach (explode('/', $image) as $segment) {
                    $entries = is_dir($directory) ? scandir($directory) : [];
                    if (!in_array($segment, $entries, true)) {
                        $errors[] = basename($view).': '.$image;
                        break;
                    }
                    $directory .= '/'.$segment;
                }
            }

            if (preg_match('~src\s*=\s*["\x27]YOUR_~i', $contents)) {
                $errors[] = basename($view).': image source contains a placeholder';
            }
        }

        $this->assertSame([], $errors, implode("\n", $errors));
    }
}
