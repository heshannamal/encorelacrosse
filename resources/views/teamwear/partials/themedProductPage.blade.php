<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ asset($heroImage) }}"
                class="img-fluid w-100"
                alt="{{ $pageHeading }}"
                style="object-fit: cover; height: 100vh;">

            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3 w-100">
                <h2 class="display-3 fw-bold" style="font-family: 'Bebas Neue', sans-serif;">ENCORE CUSTOM TEAM APPAREL</h2>
                <p class="lead fs-4">HOW YOU LOOK. HOW YOU FEEL. HOW YOU PERFORM.</p>
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000; display: inline-block;">
                        <strong>&nbsp; &nbsp; {{ strtoupper($pageHeading) }} &nbsp; &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

@foreach ($products as $index => $product)
    @php
        $imageFirst = $index % 2 === 0;
        $sectionBackground = $index % 2 === 0 ? '#f7f7f7' : '#ffffff';
        $images = $product['images'] ?? [];
        $hasImages = count($images) > 0;
        $mainImage = $hasImages ? $images[0] : null;
    @endphp

    <section class="container-fluid py-5 px-md-5" style="background-color: {{ $sectionBackground }};">
        <div class="row align-items-center g-5">
            @if ($hasImages && $imageFirst)
                <div class="col-12 col-md-6 text-center">
                    <img src="{{ asset($mainImage) }}"
                        alt="{{ $product['title'] }}"
                        class="main-image img-fluid rounded shadow-sm mb-4"
                        style="max-height: 480px; object-fit: contain;">

                    @if (count($images) > 1)
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            @foreach ($images as $imageIndex => $image)
                                <img src="{{ asset($image) }}"
                                    class="thumbnail img-thumbnail"
                                    alt="{{ $product['title'] }} view {{ $imageIndex + 1 }}"
                                    style="width: 80px; cursor: pointer;"
                                    onclick="changeImage(this)">
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <div class="{{ $hasImages ? 'col-12 col-md-6' : 'col-12 col-lg-8 mx-auto' }}">
                <div class="border rounded-pill text-center py-2 px-4 mb-4"
                    style="border: 2px solid #cfcfcf !important; display: inline-block; background-color: #fff;">
                    <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">{{ $product['title'] }}</h2>
                </div>

                @if (!empty($product['designer_notes']))
                    <h5>DESIGNER'S NOTES</h5>
                @endif

                @if (!empty($product['description']))
                    <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                        {{ $product['description'] }}
                    </p>
                @endif

                @if (!empty($product['features']))
                    <ul class="list-unstyled mt-4 text-secondary" style="font-size: 1rem; line-height: 1.8;">
                        @foreach ($product['features'] as $feature)
                            <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>{{ $feature }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @if ($hasImages && !$imageFirst)
                <div class="col-12 col-md-6 text-center">
                    <img src="{{ asset($mainImage) }}"
                        alt="{{ $product['title'] }}"
                        class="main-image img-fluid rounded shadow-sm mb-4"
                        style="max-height: 480px; object-fit: contain;">

                    @if (count($images) > 1)
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            @foreach ($images as $imageIndex => $image)
                                <img src="{{ asset($image) }}"
                                    class="thumbnail img-thumbnail"
                                    alt="{{ $product['title'] }} view {{ $imageIndex + 1 }}"
                                    style="width: 80px; cursor: pointer;"
                                    onclick="changeImage(this)">
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>
@endforeach

@if (!empty($customizeImages))
<section id="customize-your-look" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <h2 class="display-4 py-3 mb-0">CUSTOMIZE YOUR LOOK</h2>
            <div class="w-100 text-center">
                <img src="{{ asset($customizeImages[0]) }}"
                    class="main-image img-fluid w-100 mb-3"
                    alt="Customize {{ $pageHeading }}"
                    style="object-fit: cover; width: 100%; min-height: 520px; height: 100%;">

                @if (count($customizeImages) > 1)
                    <div class="d-flex justify-content-center gap-3 flex-wrap pb-3 px-3">
                        @foreach ($customizeImages as $imageIndex => $image)
                            <img src="{{ asset($image) }}"
                                class="thumbnail img-thumbnail"
                                alt="Customize {{ $pageHeading }} design {{ $imageIndex + 1 }}"
                                style="width: 80px; cursor: pointer;"
                                onclick="changeImage(this)">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="col-12 col-md-6 d-flex flex-column justify-content-center p-4 p-lg-5">
            <h2 class="display-4">Get in touch</h2>

            <form action="#" method="POST" onsubmit="return false;">
                <div class="form-group mb-3">
                    <label for="{{ $formId }}-name">Name:</label>
                    <input type="text" class="form-control" id="{{ $formId }}-name" placeholder="Enter your name" name="name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="{{ $formId }}-phone">Phone:</label>
                    <input type="text" class="form-control" id="{{ $formId }}-phone" placeholder="Enter your phone number" name="phone">
                </div>

                <div class="form-group mb-3">
                    <label for="{{ $formId }}-email">Email:</label>
                    <input type="email" class="form-control" id="{{ $formId }}-email" placeholder="Enter your email address" name="email" required>
                </div>

                <div class="form-group mb-3">
                    <label for="{{ $formId }}-message">Message:</label>
                    <textarea class="form-control" id="{{ $formId }}-message" placeholder="{{ $messagePlaceholder ?? 'I am interested in custom teamwear...' }}" name="message" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</section>
@endif

@if (!empty($galleryImages))
<section class="container-fluid px-0" aria-label="{{ $pageHeading }} gallery">
    @if (count($galleryImages) >= 1)
        <div class="row g-0">
            @foreach (array_slice($galleryImages, 0, 2) as $galleryIndex => $image)
                <div class="col-12 {{ count(array_slice($galleryImages, 0, 2)) === 1 ? '' : 'col-md-6' }} d-flex flex-column align-items-center">
                    <img src="{{ asset($image) }}" class="img-fluid w-100"
                        alt="{{ $pageHeading }} gallery {{ $galleryIndex + 1 }}"
                        style="object-fit: cover; width: 100%; height: 100%; min-height: 420px;">
                </div>
            @endforeach
        </div>
    @endif

    @if (count($galleryImages) >= 3)
        <div class="row g-0">
            @foreach (array_slice($galleryImages, 2, 3) as $galleryIndex => $image)
                <div class="col-12 col-md-4 d-flex flex-column align-items-center">
                    <img src="{{ asset($image) }}" class="img-fluid w-100"
                        alt="{{ $pageHeading }} gallery {{ $galleryIndex + 3 }}"
                        style="object-fit: cover; width: 100%; height: 100%; min-height: 380px;">
                </div>
            @endforeach
        </div>
    @endif

    @if (count($galleryImages) > 5)
        <div class="row g-0">
            @foreach (array_slice($galleryImages, 5, 2) as $galleryIndex => $image)
                <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                    <img src="{{ asset($image) }}" class="img-fluid w-100"
                        alt="{{ $pageHeading }} gallery {{ $galleryIndex + 6 }}"
                        style="object-fit: cover; width: 100%; height: 100%; min-height: 420px;">
                </div>
            @endforeach
        </div>
    @endif
</section>
@endif

<script>
    function changeImage(thumbnail) {
        var section = thumbnail.closest('section');
        var mainImage = section ? section.querySelector('.main-image') : null;

        if (mainImage) {
            mainImage.src = thumbnail.src;
        }
    }
</script>
