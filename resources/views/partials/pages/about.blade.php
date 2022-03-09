@php
$about_content = $about_page_content['content'];
$about_content_img_right = $about_page_content['content_with_image_right'];
$about_content_img_left = $about_page_content['content_with_image_left'];

$rr_content = $about_page_content['rr_content'];
$rr_logo = $about_page_content['rr_logo'];
$rr_url = $about_page_content['rr_url'];
@endphp

<div class="container-fluid bg-light py-4">
    <div class="container">
        <hr class="bg-primary">
        <h2 class="text-center">{{ __('About', 'breathtobody') }}</h2>
        <hr class="bg-primary">

        <div class="row py-5">
            @if (!empty($about_content_img_left))
                @include('partials.acf.content-with-image-left', [
                    'content_override' => $about_content_img_left,
                ])
            @endif
        </div>

        <div class="row d-flex d-lg-none justify-content-center">
            <div class="col-6 d-flex justify-content-center">
                    {!! $about_page_image !!}
            </div>
        </div>

        <div class="row py-5">
            @if (!empty($about_content_img_right))
                @include('partials.acf.content-with-image-right', [
                    'content_override' => $about_content_img_right,
                ])
            @endif
        </div>

        <div class="row">
            @if (!empty($about_content))
                @include('partials.acf.content', [
                    'content_override' => $about_content,
                ])
            @endif
        </div>
    </div>
</div>
<div class="container">
    <div class="row my-5">
        <div class="col-6 col-lg-9 d-flex align-items-center">
            <span class="h4">{!! $rr_content !!}</span>
        </div>
        <div class="col-6 col-lg-3 d-flex justify-content-center align-items-center">
            @if (!empty($rr_url))
                <a href="{{ esc_url($rr_url) }}" target="_blank" rel="noopener noreferrer">
            @endif
            <img src="{!! esc_url($rr_logo['sizes']['thumbnail']) !!}" alt="{{ esc_attr($rr_logo['alt']) }}" class="img-fluid">
            @if (!empty($rr_url))
                </a>
            @endif
        </div>
    </div>
</div>
