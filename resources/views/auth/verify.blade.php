@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-screen-xl mt-5 text-center">
        <div class="text-2xl">{{ __('Verify Your Email Address') }}</div>
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                        class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline rounded mt-5 max-w-sm">{{ __('click here to request another') }}</button>
                .
            </form>
        </div>
    </div>
@endsection
