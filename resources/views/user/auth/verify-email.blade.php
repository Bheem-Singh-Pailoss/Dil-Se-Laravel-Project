@extends('layouts.app')
@section('title', 'User Verify Email')
@section('frontcontent')
<div class="login_wrapper">
      <section class="about_se about_left_image py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="about_img about_sign_img">
                <img src="{{asset('frontend/img/signin.png')}}" alt="">
              </div>
            </div>
            <div class="col-md-6">
            <form method="POST" action="{{ route('user.verification.send') }}" class="contact_form">  @csrf
                  <div class="tittle_heading">
                  {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600" >
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
        <div>
             <x-primary-button  class="theme_btn">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>
              </div>
              <form method="POST" action="{{ route('user.logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
          </div>
        </div>
      </section>
    </div>
@endsection