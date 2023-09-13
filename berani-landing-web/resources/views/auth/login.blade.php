<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">{{ __('Sign In') }}</h1>
                            <div class="text-gray-400 fw-bold fs-4">
                                {{ __('New Here?') }}
                                <a href="{{ route('register') }}" class="link-primary fw-bolder">
                                    {{ __('Create an Account') }}
                                </a>
                            </div>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">
                                {{ __('Email') }}
                            </label>
                            <input
                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" type="text" name="email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
                                <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">
                                    {{ __('Forgot Password?') }}
                                </a>
                            </div>
                            <input
                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                type="password" name="password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-solid form-check-inline">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }} />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">{{ __('Login') }}</span>
                            </button>
                            <div class="text-center text-muted text-uppercase fw-bolder mb-5">
                                {{ __('or') }}
                            </div>
                            <a href="{{ route('login.google') }}"
                                class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="{{ asset('img/google-icon.svg') }}" class="h-20px me-3" />
                                {{ __('Continue with Google') }}
                            </a>
                        </div>
                        <div class="text-center mb-10">
                            <div class="fs-4">
                                <a href="{{ route('/') }}" class="link-primary fw-bold">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/plugins.bundle.js') }}"></script>
</body>

</html>