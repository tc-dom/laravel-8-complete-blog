@extends('layouts.app')

@section('content')

<form style="max-width:400px;" class="m-auto border p-4" method="POST" action="{{ route('login') }}">

    @csrf





    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        @error('email')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>

        <input id="password" type="password" class="form-control" name="password" required>
    </div>


    <div class="mb-3 form-check">
        <label class="inline-flex items-center text-sm text-gray-700" for="remember">
            <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
            <span class="form-check-label">{{ __('Remember Me') }}</span>
        </label>

        @if (Route::has('password.request'))
        <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>
    @error('password')
    <p class="text-red-500 text-xs italic mt-4">
        {{ $message }}
    </p>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>

    @if (Route::has('register'))
    <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
        {{ __("Don't have an account?") }}
        <a class="btn btn-sm" href="{{ route('register') }}">
            {{ __('Register') }}
        </a>
    </p>
    @endif
</form>

@endsection