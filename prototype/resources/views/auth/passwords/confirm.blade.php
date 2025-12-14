@extends('layouts.app')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gray-100">
    
    <div class="bg-white border border-gray-300 rounded shadow-md w-[500px]">
        
        <!-- Header -->
        <div class="border-b px-6 py-3 text-lg font-semibold text-gray-700">
            {{ __('Confirm Password') }}
        </div>

        <!-- Body -->
        <div class="p-6 text-gray-700">

            <p class="mb-5 text-sm">
                {{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="flex items-center mb-5">
                    <label for="password" class="w-40 text-right pr-4 text-gray-700">
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

                <!-- Buttons -->
                <div class="flex items-center ml-[160px] gap-4">
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-1.5 rounded hover:bg-blue-700 transition">
                        {{ __('Confirm Password') }}
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
