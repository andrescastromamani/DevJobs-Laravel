@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-screen-xl mt-5">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-20">
                    <div
                        class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">{{ __('Reset Password') }}</div>

                    <div class="py-10 px-10">
                        @if (session('status'))
                            <div class="bg-green-200 p-2 rounded" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" novalidate>
                            @csrf
                            <div class="flex flex-wrap mt-5">
                                <label for="email"
                                       class="block text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email"
                                       class="p-2 bg-gray-300 rounded form-input w-full @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                <span
                                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1 mt-2 w-full text-sm rounded"
                                    role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="flex flex-wrap mb-6 mt-5">
                                <button type="submit"
                                        class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline rounded">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
