@extends('layouts.app')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gray-100">
    
    <div class="bg-white border border-gray-300 rounded shadow-md w-[500px]">
        
        <!-- Header -->
        <div class="border-b px-6 py-3 text-lg font-semibold text-gray-700">
            {{ __('Register') }}
        </div>

        <!-- Body -->
        <div class="p-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="flex items-center mb-4">
                    <label for="name" class="w-40 text-right pr-4 text-gray-700">
                        {{ __('Name') }}
                    </label>

                    <div>
                        <input id="name" type="text"
                            class="border border-gray-300 rounded px-3 py-1.5 w-64
                            @error('name') border-red-500 @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus>

                        @error('name')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-center mb-4">
                    <label for="email" class="w-40 text-right pr-4 text-gray-700">
                        {{ __('Email') }}
                    </label>

                    <div>
                        <input id="email" type="email"
                            class="border border-gray-300 rounded px-3 py-1.5 w-64
                            @error('email') border-red-500 @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email">

                        @error('email')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="flex items-center mb-4">
                    <label for="password" class="w-40 text-right pr-4 text-gray-700">
                        {{ __('Password') }}
                    </label>

                    <div>
                        <input id="password" type="password"
                            class="border border-gray-300 rounded px-3 py-1.5 w-64
                            @error('password') border-red-500 @enderror"
                            name="password"
                            required
                            autocomplete="new-password">

                        @error('password')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="flex items-center mb-5">
                    <label for="password-confirm" class="w-40 text-right pr-4 text-gray-700">
                        {{ __('Confirm Password') }}
                    </label>

                    <div>
                        <input id="password-confirm" type="password"
                            class="border border-gray-300 rounded px-3 py-1.5 w-64"
                            name="password_confirmation"
                            required
                            autocomplete="new-password">
                    </div>
                </div>

                <!-- Button -->
                <div class="flex items-center ml-[160px]">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-1.5 rounded hover:bg-blue-700 transition">
                        {{ __('Register') }}
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>
@endsection
