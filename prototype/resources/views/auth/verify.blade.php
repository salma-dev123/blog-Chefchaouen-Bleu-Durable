@extends('layouts.app')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gray-100">
    
    <div class="bg-white border border-gray-300 rounded shadow-md w-[500px]">
        
        <!-- Header -->
        <div class="border-b px-6 py-3 text-lg font-semibold text-gray-700">
            {{ __('Verify Your Email Address') }}
        </div>

        <!-- Body -->
        <div class="p-6 text-gray-700 text-sm">

            @if (session('resent'))
                <div class="mb-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p class="mb-3">
                {{ __('Before proceeding, please check your email for a verification link.') }}
            </p>

            <p class="mb-3">
                {{ __('If you did not receive the email') }},
            </p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="text-blue-600 hover:underline text-sm">
                    {{ __('click here to request another') }}
                </button>
            </form>

        </div>

    </div>

</div>
@endsection
