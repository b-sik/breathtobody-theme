<div class="container my-5">
    @if (!empty($content))
        @include('partials.acf.content')
    @elseif(!empty($content_with_image))
        @include('partials.acf.content-with-image')
    @endif

    @if (is_front_page())
        @include('partials.pages.about')
    @endif
</div>
