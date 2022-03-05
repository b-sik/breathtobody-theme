@php
$image = $content_with_image['image'];

// var_dump($image);
@endphp


<div class="row">
    <div class="col-12 col-lg-6 d-flex flex-column text-center justify-content-center align-items-center">
        {!! $content_with_image['content'] !!}
    </div>
    <div class="col-12 col-lg-6 d-flex justify-content-center">
        <div class="card w-75">
            <img class="card-img-top" src="{!! $image['url'] !!}" alt="{!! $image['alt'] !!}">
              <small class="card-text text-muted text-center my-2 font-italic">{!! $image['caption'] !!}</small>
            </div>
          </div>
    </div>
</div>
