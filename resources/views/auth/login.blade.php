<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"  content="R R Courier And Cargo in Prabhadevi, Mumbai-400025-Get R R Courier And Cargo in Prabhadevi address, phone numbers, user ratings, reviews, contact person and quotes instantly." />
    <meta name="keywords" content="R R Courier And Cargo in Prabhadevi, R R Courier And Cargo in Mumbai, R R Courier And Cargo ratings, reviews of R R Courier And Cargo, R R Courier And Cargo address, R R Courier And Cargo phone numbers, R R Courier And Cargo contact person, get quotes from R R Courier And Cargo, R R Courier And Cargo in 400025" />
    <meta name="author" content="R. R. COURIER & CARGO">

    <!-- Open Meta Data -->
    <meta property="og:title"
    content="Service Provider of LOCAL Courier Service & Domestic Courier Service by R. R. Courier & Cargo, Mumbai" />
    <meta property="og:site_name" content="IndiaMART.com" />
    <meta property="og:url" content="https://www.indiamart.com/r-r-courier-cargo/" />
    <meta property="og:image" content="https://5.imimg.com/data5/SELLER/Default/2021/4/NK/UD/VY/44529036/local-courier-service-250x250.jpg" />
    <meta property="og:image:url" content="https://5.imimg.com/data5/SELLER/Default/2021/4/NK/UD/VY/44529036/local-courier-service-250x250.jpg" />
    <meta property="og:image:width" content="250" />
    <meta property="og:image:height" content="142" />
    <meta property="og:description" content="R. R. Courier & Cargo - Service Provider of LOCAL Courier Service, Domestic Courier Service & International Courier Services from Mumbai, Maharashtra, India" />

    <!-- Twitter Meta Data -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Service Provider of LOCAL Courier Service & Domestic Courier Service by R. R. Courier & Cargo, Mumbai" />
    <meta name="twitter:description" content="R. R. Courier & Cargo - Service Provider of LOCAL Courier Service, Domestic Courier Service & International Courier Services from Mumbai, Maharashtra, India" />
    <meta name="twitter:image" content="https://5.imimg.com/data5/SELLER/Default/2021/4/NK/UD/VY/44529036/local-courier-service-250x250.jpg" />
    <meta name="twitter:image:width" content="250" />
    <meta name="twitter:image:height" content="142" />

    <title>R. R. COURIER & CARGO | Login</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/icons/dtdc_logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">

    <!-- Toaster Message -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">

                <img class="img-fluid logo-dark mb-2 logo-color" src="{{ url('/') }}/assets/icons/DTDC_icon.png" alt="Logo">
                <div class="loginbox">

                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>

                            <form method="POST" action="{{ route('login.store') }}" enctype="multipart/form">
                                @csrf

                                <div class="form-group mb-2">
                                    <label class="form-control-label"><b>Mobile Number : <span class="text-danger">*</span></b></label>
                                    <input id="mobile_no" type="mobile_no" onkeypress='validate(event)' maxlength="10"
                                        class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no"
                                        value="{{ old('mobile_no') }}" autocomplete="mobile_no" autofocus
                                        placeholder="Enter Mobile Number">

                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label"><b>Password : <span class="text-danger">*</span></b></label>
                                    <div class="pass-group">
                                        <input id="password" type="password"
                                            class="form-control pass-input @error('password') is-invalid @enderror"
                                            name="password" autocomplete="current-password"
                                            placeholder="Enter Password">
                                        <span class="fas fa-eye toggle-password"></span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ url('/') }}/assets/js/jquery-3.7.1.min.js"></script>

    <!-- Feather Icon JS -->
    <script src="{{ url('/') }}/assets/js/feather.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ url('/') }}/assets/js/script.js"></script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>

</body>

</html>
