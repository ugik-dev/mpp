@extends('panel/layout/homeLayout');
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"
                                style="background-image: url({{ asset('assets/image/logo.PNG') }}) ;;background-repeat:no-repeat; background-position: center center !important;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Panel!</h1>
                                        <h2 class="h4 text-gray-900 mb-4">Mall Pelayanan Terpadu</h2>
                                    </div>
                                    <form class="user" id="loginForm">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name="username" aria-describedby="emailHelp"
                                                placeholder="Enter Username or Email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    {{-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            cur_sh = 'hide';
            $('.show-hide').on('click', function() {
                if (cur_sh == 'hide') {
                    console.log('go show')
                    cur_sh = 'show';
                    $('#password').prop('type', 'text')
                } else {
                    // console.log('go show')
                    cur_sh = 'hide';
                    $('#password').prop('type', 'password')
                }
            })
            var loginForm = $('#loginForm');


            console.log('masuk')
            loginForm.on('submit', function(event) {
                event.preventDefault();
                // return;
                Swal.fire({
                    title: 'Please Wait !',
                    html: 'Loggin ..', // add html attribute if you want or remove
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    customClass: {
                        confirmButton: 'btn btn-primary waves-effect waves-light d-none'
                    },
                    buttonsStyling: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                    showLoaderOnConfirm: false,
                });
                Swal.showLoading()
                $.ajax({
                    url: "{{ route('login-process') }}",
                    type: "POST",
                    data: loginForm.serialize(),
                    success: (data) => {
                        // buttonIdle(submitBtn);
                        // json = JSON.parse(data);
                        console.log(data)
                        if (data['error']) {

                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal',
                                text: data['message'],
                                customClass: {
                                    confirmButton: 'btn btn-primary waves-effect'
                                }
                            });
                            return;
                        }
                        $(location).attr('href', "{{ route('panel.dashboard') }}");
                    },
                    error: () => {
                        // buttonIdle(submitBtn);
                    }
                });
            });
        });
    </script>
@endsection
