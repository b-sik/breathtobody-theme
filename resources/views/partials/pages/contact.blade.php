<section id="contact" class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 d-flex flex-column justify-content-center align-items-center">
            <h5><em>{!! $contact_fields['form_tagline'] !!}</em></h5>
            {!! do_shortcode('[contact-form-7 id="593" title="Contact form 1"]') !!}
        </div>
        <div class="col-12 col-lg-5 d-flex flex-column align-items-center justify-content-center">
            <h5>Email</h5>
            <a href='mailto:{!! $contact_fields['email'] !!}'>{!! $contact_fields['email'] !!}</a>

            <h5 class="pt-3">Phone</h5>
            <a href="tel:+1{!! str_replace('-', '', $contact_fields['phone']) !!}">{!! $contact_fields['phone'] !!}</a>

            <h5 class="pt-3">Address</h5>
            <p>{!! $contact_fields['address'] !!}</p>

            <h5>Raw Renewal</h5>
            <p>{!! $raw_renewal['address'] !!}</p>
            {!! $raw_renewal['gmaps'] !!}
        </div>
    </div>
    <div class="row justify-content-center">
        <h5 class="pt-3"><a href='{!! $contact_fields['facebook'] !!}'><i class="fab fa-facebook pr-2"></i>Facebook</a></h5>
    </div>
</section>
