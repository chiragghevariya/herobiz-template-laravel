<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row">
                <?php
                $getsetting = \App\Models\Setting::first();
                $getheading = \App\Models\Heading::first();
                $getsocial = \App\Models\Socialmedia::get();
                ?>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        @if (isset($getsetting))
                        <h3>{{ $getsetting->logo }}</h3>
                        <p>
                            {{ $getsetting->location }}<br><br>
                            <strong>Phone:</strong>&nbsp; {{ $getsetting->number }}<br>
                            <strong>Email:</strong>&nbsp; {{ $getsetting->email }}<br>
                        </p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a class="nav-link scrollto"  href="{{ route('home') }}">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a class="nav-link scrollto" href="{{ route('home') }}#about">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a class="nav-link scrollto" href="{{ route('home') }}#services">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    @if (isset($getheading))
                    <h4>{{ $getheading->service_title }}</h4>
                    @endif

                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    @if (isset($getheading))
                    <h4>{{ $getheading->newslater_title }}</h4>
                    <p>{{ $getheading->newslater_description }}</p>
                    @endif


                    {{ Form::open([
                        'id' => 'newslater',
                        'class' => 'FromSubmit',
                        'url' => route('newslater.store'),
                        'data-redirect_url' => route('home'),
                        'name' => 'newslater',
                        'enctype' => 'multipart/form-data',
                    ]) }}

                    @csrf
                    <input type="email" name="nemail" id="nemail">
                    <input type="submit" value="Subscribe">
                    </form>
                    <div>
                        <span class="text-danger" id="nemail_error"></span>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <div class="footer-legal text-center">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div class="copyright">

                    @if (isset($getsetting))
                        {!! $getsetting->copyright !!}
                    @endif

                </div>
            </div>


            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                @if (isset($getsocial) && !$getsocial->isEmpty())
                    @foreach ($getsocial as $key => $v)
                        <a href="{{ $v->link }}" target="_blank" class="{{ $v->title }}"><i
                                class="{{ $v->icon }}"></i></a>
                    @endforeach
                @endif
            </div>

        </div>
    </div>

</footer><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<div></div>

<script>
    $('form.FromSubmit').submit(function(event) {

        event.preventDefault();
        var formId = $(this).attr('id');
        //  if ($(this).valid()) {

        var formAction = $(this).attr('action');
        var $btn = $('#' + formId + ' button[type="submit"]').button('loading');
        var redirectURL = $(this).data("redirect_url");
        $.ajax({
            type: "POST",
            url: formAction,
            data: new FormData(this),
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function(response) {
                if (response.status == 1 && response.msg != "") {
                    window.location = redirectURL;
                }
            },
            error: function(jqXhr) {

                console.log(jqXhr);

                var errors = $.parseJSON(jqXhr.responseText);
                showErrorMessages(formId, errors);

            }
        });
        return false;
        //  };
    });

    function showErrorMessages(formId, errorResponse) {

        $.each(errorResponse.errors, function(key, value) {

            // console.log(key);

            $.each(value, function(key2, value2) {

                console.log(key, value2);
                $("#" + key + '_error').html(value2);
            });



        });

    }
</script>
<!-- Vendor JS Files -->
<script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('front/assets/js/main.js') }}"></script>

</body>

</html>
