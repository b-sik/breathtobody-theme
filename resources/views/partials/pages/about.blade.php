@php
$about_content = $about_page_content['content'];
$about_content_img_right = $about_page_content['content_with_image_right'];
$about_content_img_left = $about_page_content['content_with_image_left'];
@endphp

<section id="about" class="container-fluid bg-light pb-4 pt-5">
    <div class="container">
        <hr class="bg-primary">
        <h2 class="text-center">{{ __('About', 'breathtobody') }}</h2>
        <hr class="bg-primary">

        <div class="row py-5">
            @if (!empty($about_content_img_left['content']) && !empty($about_content_img_left['image']))
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
            @if (!empty($about_content_img_right['content']) && !empty($about_content_img_right['image']))
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
</section>
<div class="container">
    <div class="row my-5">
        <div class="col-6 col-lg-9 d-flex align-items-center">
            <span class="h4">{!! $raw_renewal['content'] !!}</span>
        </div>
        <div class="col-6 col-lg-3 d-flex justify-content-center align-items-center">
            @if (!empty($raw_renewal['url']))
                <a href="{{ esc_url($raw_renewal['url']) }}" target="_blank" rel="noopener noreferrer">
            @endif
            <img src="{!! esc_url($raw_renewal['logo']['sizes']['thumbnail']) !!}" alt="{{ esc_attr($raw_renewal['logo']['alt']) }}" class="grow img-fluid">
            @if (!empty($raw_renewal['url']))
                </a>
            @endif
        </div>
    </div>
</div>
