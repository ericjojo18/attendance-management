{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
 
<x-guest-layout>
  <x-jet-validation-errors class="mb-4" />
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow"> 
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{asset('assets/images/simplon.png')}}">
                </div>
                @if ($errors->any())
												<div class="alert alert-danger alert-dismissible border-1 border-left-3 border-left-danger"role="alert"">
                              <button type="button" class="close"  data-dismiss="alert"   aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                                  <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
													        </ul>
												</div>
									@endif
                <h4>BIENVENUE</h4>
                <h6 class="font-weight-light">Connectez-vous</h6>
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Votre adresse email">
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="mot de passe">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">CONNEXION</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    {{-- <div class="form-check">
                      <label class="form-check-label text-muted" for="remember_me">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember"> se rappelle
                      </label>
                    </div> --}}
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link text-black">Mot de passe Oublié?</a>
                    @endif
                  </div>
                  {{-- <div class="text-center mt-4 font-weight-light"> Avez vous un compte sinon ? <a href="{{ route('register') }}" class="text-primary"> créer un compte</a> --}}
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
</x-guest-layout>
