{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
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
                                                <button type="button"
                                                        class="close"
                                                        data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <ul>
														@foreach($errors->all() as $error)
														<li>{{$error}}</li>
														@endforeach
													</ul>
												</div>
									@endif
               
                <h4>Mot de passse oublie!  </h4>
                <h6 class="font-weight-light">veillez entrer votre adresse email pour recevoir un lien de réintialisation.</h6>
                <form class="pt-3" method="POST" action="{{ route('password.email') }}">
                  @csrf
                  <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Votre adresse email">
                  </div>
                 
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">REINTIALISATION</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-guest-layout>