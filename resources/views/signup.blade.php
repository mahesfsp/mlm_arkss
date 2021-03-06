@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('addUser') }}">
            @csrf

            <div>
                <x-jet-label for="sponsorname" value="{{ __('Sponsor Username*') }}" />
                <x-jet-input id="sponsorname" class="block mt-1 w-full" type="text" name="sponsorname"
                    :value="old('sponsorname')" autocomplete="sponsorname" />
            </div>

            <div>
                <x-jet-label for="sponsor_fullname" value="{{ __('Sponsor Full name*') }}" />
                <x-jet-input id="sponsor_fullname" class="block mt-1 w-full" type="text" name="sponsor_fullname"
                    :value="Auth::user()->name" readonly />
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


            <div id="product_container" class="col-span-6 sm:col-span-4">
                <x-jet-label for="product" value="{{ __('Product*') }}" />
                <select id="product" class="block mt-1 w-full" name="product_id">
                    <option value="" selected>Select</option>
                    @foreach($product_data as $product)
                    <option value="{{$product->product_id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <x-jet-label for="first_name" value="{{ __('First Name*') }}" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')"/>
            </div>

            <div>
                <x-jet-label for="last_name" value="{{ __('Last Name*') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="old('last_name')"  />
            </div>


            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="gender" value="{{ __('Gender*') }}" />
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
                <x-jet-label for="dob" value="{{ __('Date of Birth*') }}" />
                <x-jet-input id="dob" class="block mt-1 w-full" type="text" name="dob" :value="old('dob')" required
                    autofocus autocomplete="dob" />
            </div>

            <div>
                <x-jet-label for="passport" value="{{ __('Passport/ National ID/ Driving*') }}" />
                <x-jet-input id="passport" class="block mt-1 w-full" type="text" name="passport"
                    :value="old('passport')" required autofocus autocomplete="passport" />
            </div>


            <div>
                <x-jet-label for="address1" value="{{ __('Address Line 1*') }}" />
                <x-jet-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')"
                    required autofocus autocomplete="address1" />
            </div>


            <div>
                <x-jet-label for="address2" value="{{ __('Address Line 2') }}" />
                <x-jet-input id="address2" class="block mt-1 w-full" type="text" name="address2"
                    :value="old('address2')" autofocus autocomplete="address2" />
            </div>


            <div>
                <x-jet-label for="zipcode" value="{{ __('Zip code') }}" />
                <x-jet-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode" :value="old('zipcode')"
                    autofocus autocomplete="zipcode" />
            </div>

            <div id="country_container" class="col-span-6 sm:col-span-4">
                <x-jet-label for="country" value="{{ __('Country*') }}" />
                <select id="country" class="block mt-1 w-full" name="country_id">
                    <option value="" selected>Select</option>

                    @foreach ($datas as $data)
                    <option value="{{$data->id}}">
                        {{$data->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div id="state_container" class="col-span-6 sm:col-span-4">
                <x-jet-label for="state" value="{{ __('State*') }}" />
                <select id="state" class="block mt-1 w-full" name="state_id">
                    
                </select>
            </div>

            <div id="city_container" class="col-span-6 sm:col-span-4">
                <x-jet-label for="city" value="{{ __('City*') }}" />
                <select id="city" class="block mt-1 w-full" name="city_id">
                    
                </select>
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email*') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="landline_no" value="{{ __('Land Line No*') }}" />
                <x-jet-input id="landline_no" class="block mt-1 w-full" type="text" name="landline_no"
                    :value="old('landline_no')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="mobile" value="{{ __('Mobile No.*') }}" />
                <x-jet-input id="mobile_code" class="block mt-1 w-full" type="text" name="mobile_code"
                    :value="old('mobile_code')" required />
                <x-jet-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="user_name" value="{{ __('User Name*') }}" />
                <x-jet-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" required
                    autocomplete="user_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password*') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password*') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="free_account" value="{{ __('Check this for free account') }}" />
                <x-jet-input id="free_account" class="block mt-1 w-full" type="checkbox" name="free_account" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>


@section('script')
<script>

  

$(document).ready(function() {
console.log("hi");
$('#registration_type').on('change', function() {
    //alert(this.value );
    if (this.value === 'company_account' || this.value === 'pl_account') $('#product_container')
        .hide();
    else
    if (this.value === 'normal_registration' || this.value === '') $('#product_container').show();

});


$('#country').on('change', function() {
    var idCountry = this.value;
   // alert({{url('api/fetch-states')}});
    $("#state").html('');
    $.ajax({
        url: "{{url('api/fetch-states')}}",
        type: "POST",
        data: {
            country_id: idCountry,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
           // alert(result);
            $('#state').html('<option value="">Select State</option>');
            $.each(result.states, function(key, value) {
                $("#state").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });
            
        },error:function(){ 
        alert("error!!!!");
    }
    });
});



$('#state').on('change', function () {
                var idState = this.value;                          
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
});
</script>
@endsection

