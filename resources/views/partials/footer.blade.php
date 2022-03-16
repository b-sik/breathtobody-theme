<footer class="container-fluid text-light bg-info justify-content-center">
    <div class="row py-3 mx-auto">
        <div
            class="col-12 col-lg-4 d-flex flex-column align-items-center align-items-lg-start justify-content-center order-2 order-lg-0">
            <small class='d-block'>&copy;&nbsp;{{ date('Y') }} - {!! $site_name !!}</small>
        </div>
        <div class="col-12 col-lg-4 pb-2 pb-lg-0 d-flex justify-content-center align-items-center">
            <img src="{!! $site_icon_url !!}" class="grow img-fluid w-50 mb-3 mb-lg-0 rounded"
                style="max-width:75px;height:auto;">
        </div>
        <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end align-items-center">
            <a href='{!! $contact_fields['facebook'] !!}'><i class="fab fa-facebook h1"></i></a>
        </div>
    </div>
</footer>
