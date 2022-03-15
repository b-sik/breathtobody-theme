<article @php post_class('container pb-3 d-flex justify-content-center') @endphp>
    <div class="col-12 col-lg-8">
        <header>
            <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
            @include('partials/entry-meta')
        </header>
        <div class="entry-summary">
            @php the_excerpt() @endphp
        </div>
    </div>
</article>
