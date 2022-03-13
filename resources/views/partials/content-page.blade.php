<section class="container my-5">

    <div class="row justify-content-center">
        @if (!empty($content))
            @include('partials.acf.content')
        @endif
    </div>

    <div class="row">
        @if (!empty($content_with_image_left['content']) && !empty($content_with_image_left['image']))
            @include('partials.acf.content-with-image-left')
        @endif
    </div>

    <div class="row">
        @if (!empty($content_with_image_right['content']) && !empty($content_with_image_right['image']))
            @include('partials.acf.content-with-image-right')
        @endif
    </div>
</section>

@if (is_front_page())
    @include('partials.pages.about')
@endif
