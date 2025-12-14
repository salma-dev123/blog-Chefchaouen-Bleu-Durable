@extends('layouts.app')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gray-100">
    
    <div class="bg-white border border-gray-300 rounded shadow-md w-[500px]">
        
        <!-- Header -->
        <div class="border-b px-6 py-3 text-lg font-semibold text-gray-700">
            {{ __('Login') }}
        </div>

        <!-- Body -->
        <div class="p-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="flex items-center mb-4">
                    <label for="email" class="w-32 text-right pr-4 text-gray-700">
                        {{ __('Email') }}
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

                <!-- Password -->
                <div class="flex items-center mb-4">
                    <label for="password" class="w-32 text-right pr-4 text-gray-700">
                        {{ __('Password') }}
                    </label>

                    <div>
                        <input id="password" type="password"
                            class="border border-gray-300 rounded px-3 py-1.5 w-64
                            @error('password') border-red-500 @enderror"
                            name="password"
                            required
                            autocomplete="current-password">

                        @error('password')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Remember -->
                <div class="flex items-center mb-4 ml-[128px]">
                    <input type="checkbox" name="remember" id="remember"
                           class="mr-2"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="text-gray-700 text-sm">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex items-center ml-[128px] gap-4">
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-1.5 rounded hover:bg-blue-700 transition">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
