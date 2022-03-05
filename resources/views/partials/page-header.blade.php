<div class="page-header my-5">
    @if (is_front_page())
        <hr class="bg-primary">
            <h2 class="text-center h4 font-italic">{!! $tagline !!}</h2>
        <hr class="bg-primary">
    @else
        <h1>{!! $title !!}</h1>
    @endif
</div>
