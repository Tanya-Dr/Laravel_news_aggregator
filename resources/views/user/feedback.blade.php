@extends('layouts.main')
@section('title') - Feedback @parent @stop

@section('content')
    <h3>Leave feedback</h3>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message=$error></x-alert>
        @endforeach
    @endif
    <form class="needs-validation" style = "width: 60%" method="post" action = "{{ route('user.feedback') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            <div class="invalid-feedback">
                Please enter your name.
            </div>
        </div>
        <div class="mb-3">
            <label for="review" class="form-label">Review / Comment</label>
            <textarea class="form-control" id="review" name="review" rows="5" required>{!! old('review') !!}</textarea>
            <div class="invalid-feedback">
                Please enter your review.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@push('js')
    <script src="{{ asset('js/validate-forms.js') }}"></script>
@endpush
