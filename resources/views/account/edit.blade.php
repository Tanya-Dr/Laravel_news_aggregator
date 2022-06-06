@extends('layouts.main')
@section('title') - Account edit @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit your profile</h1>
    </div>

    <h3>Editing profile form</h3>
    @include('inc.messages')
    <form class="needs-validation" style = "width: 60%; margin-bottom: 16px;" method="post" action = "{{ route('account.update', ['user' => $user]) }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            <div class="invalid-feedback">
                Please enter a name.
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            <div class="invalid-feedback">
                Please enter your email.
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Current password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback">
                Please enter your curren password.
            </div>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a class="link-secondary" href="{{ url()->previous() }}" >Back</a>
@endsection
@push('js')
    <script src="{{ asset('js/validate-forms.js') }}"></script>
@endpush
