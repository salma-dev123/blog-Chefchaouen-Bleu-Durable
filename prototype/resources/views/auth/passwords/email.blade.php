@extends('layouts.app')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gray-100">
    
    <div class="bg-white border border-gray-300 rounded shadow-md w-[500px]">
        
        <!-- Header -->
        <div class="border-b px-6 py-3 text-lg font-semibold text-gray-700">
            {{ __('Reset Password') }}
        </div>

        <!-- Body -->
        <div class="p-6">

            @if (session('status'))
                <div class="mb-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">

                @csrf

                <!-- Email -->
                <div class="flex items-center mb-5">
                    <label for="email" class="w-40 text-right pr-4 text-gray-700">
                        {{ __('Email Address') }}
                    </label>

                    <div>
                        <input id="email" type="email"
                            class="border border-gray-300 rounded px-3 py-1.5 w-64
                            @error('email') border-red-500 @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus>

                        @error('email')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Button -->
                <div class="flex items-center ml-[160px]">
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-1.5 rounded hover:bg-blue-700 transition">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>

            </form>

        </div>
        
    </div>

</div>
@endsection
