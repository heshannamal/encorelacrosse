@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="position-relative overflow-hidden py-5 bg-light">
    <!-- Background (optional) -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>

    <div class="container position-relative text-center">
        <img
            src="https://ucarecdn.com/868cd6f4-4965-4962-9809-1da657f684f2/-/format/auto/-/preview/3000x3000/-/quality/lighter/BUffolow.png"
            alt="Hero Image"
            class="img-fluid"
            style="max-width: 40%; max-height: 10%;">
    </div>
</section>

<section>
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-lg-3 d-none d-lg-block"></div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="p-5 text-center rounded-4 shadow"
                    style="background:#0a4da1;">
                    <h1 class="fw-bold text-white mb-1">
                        CALIFORNIA
                        <span style="color:#EBF088;">BUFFALO WINGS</span>
                    </h1>
                    <h1 class="fw-bold text-white mb-4">
                        Oakland
                    </h1>
                    <a href="https://encorelacrosse.com/pages/oakland"
                        target="_blank"
                        class="btn btn-lg"
                        style="background:#d4b623; color:#fff; font-weight:600;">
                        More Info
                    </a>
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block"></div>
        </div>
    </div>
</section>

@endsection