@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-blue-600 text-white text-center py-4 text-lg font-semibold">
                {{ __('Dashboard') }}
            </div>

            <!-- Body -->
            <div class="p-6">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p class="text-gray-700">{{ __('You are logged in!') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
