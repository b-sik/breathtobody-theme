<footer class="container-fluid text-light bg-info justify-content-center">
    <div class="row py-3 mx-auto">
        <div
            class="col-12 col-lg-6 d-flex flex-column align-items-center align-items-lg-start justify-content-center order-2 order-lg-0">
            <small class='d-block'>&copy;&nbsp;{{ date('Y') }} - {!! $site_name !!}</small>
        </div>
        <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end align-items center">
            <img src="{!! $site_icon_url !!}" class="img-fluid w-50 mb-3 mb-lg-0 rounded" style="max-width:75px;height:auto;">
        </div>
    </div>
</footer>
