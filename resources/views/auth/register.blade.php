{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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
                      <img src="../../assets/images/logo.svg">
                    </div>
                    <h4>New here?</h4>
                    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                    <form class="pt-3" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="nom"> Nom : </label>
                        <input type="text" class="form-control form-control-lg" id="nom" name="nom">
                      </div>
                      <div class="form-group">
                        <label for="nom"> Prenom : </label>
                      <input type="text" class="form-control form-control-lg" id="prenom" name="prenom">
                    </div>
                      <div class="form-group">
                          <label for="">Adresse email</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email">
                      </div>
                      <div class="form-group">
                          <label for="password">Mot de passe</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                      </div>
                      <div class="form-group">
                          <label for="password_confirmation"> Confirme mot de passe</label>
                        <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation">
                      </div>
                      <div class="mb-4">
                        <div class="form-check">
                          <label class="form-check-label text-muted">
                            <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                        </div>
                      </div>
                      <div class="mt-3">
                          <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">ENREGISTRE</button>
                      </div>
                      <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.html" class="text-primary">Login</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    
</x-guest-layout>
