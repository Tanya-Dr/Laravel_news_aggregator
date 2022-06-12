@extends('layouts.admin')
@section('title') - Add source @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add source</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <h3>Adding source's form</h3>
    @include('inc.messages')
    <form class="needs-validation" style = "width: 60%" method="post" action = "{{ route('admin.sources.store') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            <div class="invalid-feedback">
                Please enter a title.
            </div>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-dm example" id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value = {{ $category->id }} @if(old('category_id') === $category->id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}" required>
            <div class="invalid-feedback">
                Please enter an url.
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image url</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label for="last_build_date" class="form-label">Last Build Date</label>
            <input type="date" class="form-control" id="last_build_date" name="last_build_date" value="{{ old('last_build_date') }}" style="width: fit-content;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@push('js')
    <script src="{{ asset('js/validate-forms.js') }}"></script>
@endpush
