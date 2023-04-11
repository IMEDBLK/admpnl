<!DOCTYPE html>

<html lang="fr" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>drivo_Login </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
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
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center mb-5">se connecter</h2>
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf


                <div class="row mb-3">
    <div class="col-md-6">
        <input id="email" type="email" placeholder="Saisir votre mail" class="intro-x login__input form-control py-3 px-4 block @error('email') border border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required="true">
        @error('email')
            <div class="border border-red-500 px-4 py-2 rounded-md bg-red-50 mt-2">
                <strong class="text-red-500">{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>
<div class="row mb-3">
  <div class="col-md-6">
    <input id="password" type="password" placeholder="Mot de passe" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
    @error('password')
      <div class="border-red-500 border-2 rounded-md p-2 mt-2">
        <strong class="text-red-500">{{ $message }}</strong>
      </div>
    @enderror
  </div>
</div>
                <div class="row mb-3">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-0">
                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-40 xl:mr-3 align-top">{{ __('se connecter') }}</button>
                    @if (Route::has('password.request'))
                      <a class="btn btn-outline-secondary py-3 px-4 w-full xl:w-40 mt-3 xl:mt-0 align-top" href="{{ route('password.request') }}">{{ __('mot de passe oublié ?') }}</a>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
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
