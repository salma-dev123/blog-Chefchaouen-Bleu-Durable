@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 py-10">
    <div class="bg-white shadow-md rounded-xl overflow-hidden">

        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Reset Password') }}
            </h2>
        </div>

        <!-- Body -->
        <div class="px-6 py-6">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Token -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-1">
                        {{ __('Email Address') }}
                    </label>

                    <input 
                        id="email" 
                        type="email"
                        name="email" 
                        value="{{ $email ?? old('email') }}" 
                        required autocomplete="email" autofocus
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                    >

                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-1">
                        {{ __('Password') }}
                    </label>

                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required autocomplete="new-password"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                    >

                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password-confirm" class="block text-gray-700 font-medium mb-1">
                        {{ __('Confirm Password') }}
                    </label>

                    <input 
                        id="password-confirm" 
                        type="password" 
                        name="password_confirmation" 
                        required autocomplete="new-password"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <!-- Submit -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg font-medium transition"
                >
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection