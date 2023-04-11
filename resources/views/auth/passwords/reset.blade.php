


<!DOCTYPE html>

<html lang="fr" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{asset('dist/images/logo.svg')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>drivo_Login </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="{{ route('dashbord') }}" class="-intro-x flex items-center pt-5">
                        <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{asset('dist/images/logo.svg')}}">
                        <span class="text-white text-lg ml-3"> R </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{asset('dist/images/illustration.svg')}}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        quelques clics pour
                            <br>
                            accéder a votre compte
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Gérez tous vos données en un seul endroit</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->


                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0 mt-5">
  <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0  shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">



  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center mb-5">changer mot de passe</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="intro-x login__input form-control py-3 px-4 block @error('email') border border-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>


                            </div>
                        </div>
                        @error('email')
                                    <span class="alert alert-danger mt-5" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">


                            </div>
                        </div>

                        @error('password')
                                    <span class="alert alert-danger mt-5" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') border-red-500 @enderror" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


                <!-- END: Login Form -->
            </div>
        </div>

        <!-- BEGIN: JS Assets-->
        <script src="{{asset('dist/js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>




















































