@php
$image = $content_override ? $content_override['image'] : $content_with_image_left['image'];
$content = $content_override ? $content_override['content'] : $content_with_image_left['content'];
@endphp


<div class="col-12 col-lg-6 mb-5 mb-lg-0 d-flex justify-content-center align-items-center">
    <div class="grow card w-75">
        <img class="card-img-top" src="{!! $image['url'] !!}" alt="{!! $image['alt'] !!}">
        <small class="card-text text-muted text-center my-2 font-italic">{!! $image['caption'] !!}</small>
    </div>
</div>
<div class="col-12 col-lg-6 d-flex flex-column text-center justify-content-center align-items-center">
    {!! $content !!}
</div>
