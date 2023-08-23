@extends('layouts.app')
@section('title', 'User Dashboard')
@section('frontcontent')
<section class="menu_main1 py_8">
    <div class="container">
        <div class="tittle_heading">
            <h2>User dashboard</h2>
        </div>
    <div class="row">
        <div class="col-lg-3">
            @include('user.layouts.partials.user_sidebar')
        </div>
        <div class="col-lg-9">


    <form method="post" action="{{ route('user.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="cusstom_input">
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div  class="cusstom_input">
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div  class="cusstom_input">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

               <script>
                Swal.fire({
    title: 'Success!',
    text: 'Password updated sucessfully.',
    icon: 'success',
    timer: 2000, // close after 2 seconds
    showConfirmButton: false
});

                </script>
            @endif
        </div>
    </form>


</div>
</section>

@endsection
