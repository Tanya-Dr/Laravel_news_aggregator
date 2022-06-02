@extends('layouts.main')
@section('title') - Make an order @parent @stop

@section('content')
    <h3>Make an order</h3>
    @include('inc.messages')
    <form class="needs-validation" style = "width: 60%" method="post" action = "{{ route('user.storeOrder') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" required>
            <div class="invalid-feedback">
                Please enter your name.
            </div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="111-22-333">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            <div class="invalid-feedback">
                Please enter your email.
            </div>
        </div>
        <div class="mb-3">
            <label for="info" class="form-label">Order information</label>
            <textarea class="form-control" id="info" name="info" rows="5" required>{!! old('info') !!}</textarea>
            <div class="invalid-feedback">
                Please enter an order information.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@push('js')
    <script src="{{ asset('js/validate-forms.js') }}"></script>
@endpush
