<div class="container my-5">
    <div class="row">
        @if (!empty($content))
            @include('partials.acf.content')
        @endif
    </div>

    <div class="row">
        @if (!empty($content_with_image_left))
            @include('partials.acf.content-with-image-left')
        @endif
    </div>

    <div class="row">
        @if (!empty($content_with_image_right))
            @include('partials.acf.content-with-image-right')
        @endif
    </div>
</div>

@if (is_front_page())
    @include('partials.pages.about')
@endif
