<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Confirm') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
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
                        <button type="button" class="close" data-dismiss="alert"  aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            <ul>
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
					</div>
				@endif
               
                <h4>Pour une meilleur securite !  </h4>
                <h6 class="font-weight-light">Veillez confirmer votre mot de passe pour continuer</h6>
                <form class="pt-3" method="POST" action="{{ route('password.confirm') }}">
                  @csrf
                  <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password"  required autocomplete="new-password">
                  </div>
                 
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Confirmer</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-guest-layout>