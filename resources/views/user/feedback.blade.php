@extends('layouts.main')
@section('title') - Feedback @parent @stop

@section('content')
    <h3>Leave feedback</h3>
    @include('inc.messages')
    <form class="needs-validation" style = "width: 60%" method="post" action = "{{ route('user.feedback') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" required>
            <div class="invalid-feedback">
                Please enter your name.
            </div>
        </div>
        <div class="mb-3">
            <label for="text_review" class="form-label">Review / Comment</label>
            <textarea class="form-control" id="text_review" name="text_review" rows="5" required>{!! old('text_review') !!}</textarea>
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
