<article @php post_class('container py-5') @endphp>
  <header class="pb-5">
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
      @php the_content() @endphp
</article>
