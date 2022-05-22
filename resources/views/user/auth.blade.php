@extends('layouts.main')
@section('title') - Sign in @parent @stop

@section('content')
<form class="form-signin text-center needs-validation" method="post" action="{{ route('user.auth') }}" novalidate>
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
        <label for="email">Email address</label>
        <div class="invalid-feedback">
            Please enter your email.
        </div>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <label for="password">Password</label>
        <div class="invalid-feedback">
            Please enter your password.
        </div>
    </div>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me" name="rememberCheck"> Remember me
        </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
</form>
<div class="form-signin text-center">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message=$error></x-alert>
        @endforeach
    @endif
</div>
@endsection
@push('js')
    <script src="{{ asset('js/validate-forms.js') }}"></script>
@endpush
