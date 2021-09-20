<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('addUser') }}">
            @csrf

            <div>
                <x-jet-label for="sponsorname" value="{{ __('Sponsor Username*') }}" />
                <x-jet-input id="sponsorname" class="block mt-1 w-full" type="text" name="sponsorname"
                    :value="old('sponsorname')" required autofocus autocomplete="sponsorname" />
            </div>

            <div>
                <x-jet-label for="sponsor_fullname" value="{{ __('Sponsor Full name*') }}" />
                <x-jet-input id="sponsor_fullname" class="block mt-1 w-full" type="text" name="sponsor_fullname"
                    :value="old('sponsor_fullname')" required autofocus autocomplete="sponsor_fullname" />
            </div>


            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="position" value="{{ __('Position*') }}" />
                <select id="position" class="block mt-1 w-full" name="position">
                    <option value="" disabled selected>Select</option>
                    <option value="left">
                        Left
                    </option>
                    <option value="right">
                        Right
                    </option>

                </select>
            </div>


            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="registration_type" value="{{ __('Registration Type*') }}" />
                <select id="registration_type" class="block mt-1 w-full" name="registration_type">
                    <option value="" selected>Select</option>
                    <option value="company_account">
                        Company Account
                    </option>
                    <option value="pl_account">
                        PL Account
                    </option>
                    <option value="normal_registration">
                        Normal Registration
                    </option>

                </select>
            </div>


            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="product" value="{{ __('Product*') }}" />
                <select id="product" class="block mt-1 w-full" name="product">
                    <option value="" selected>Select</option>
                    @foreach($product_data as $product)
                    <option value="{{$product->product_id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <x-jet-label for="first_name" value="{{ __('First Name*') }}" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')" required autofocus autocomplete="first_name" />
            </div>

            <div>
                <x-jet-label for="last_name" value="{{ __('Last Name*') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="old('last_name')" required autofocus autocomplete="last_name" />
            </div>

            
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="gender" value="{{ __('Gender') }}" />
                <select id="gender" class="block mt-1 w-full" name="gender">

                    <option value="m">
                        Male
                    </option>
                    <option value="f">
                        Female
                    </option>

                </select>
            </div>

            <div>
                <x-jet-label for="passport" value="{{ __('Passport/ National ID/ Driving*') }}" />
                <x-jet-input id="passport" class="block mt-1 w-full" type="text" name="passport"
                    :value="old('passport')" required autofocus autocomplete="passport" />
            </div>


            <div>
                <x-jet-label for="address" value="{{ __('Address Line 1*') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address"
                    :value="old('address')" required autofocus autocomplete="address" />
            </div>


            <div>
                <x-jet-label for="address2" value="{{ __('Address Line 2*') }}" />
                <x-jet-input id="address2" class="block mt-1 w-full" type="text" name="address2"
                    :value="old('address2')" required autofocus autocomplete="address2" />
            </div>


            <div>
                <x-jet-label for="zipcode" value="{{ __('Zip code') }}" />
                <x-jet-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode"
                    :value="old('zipcode')" required autofocus autocomplete="zipcode" />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
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
</x-guest-layout>