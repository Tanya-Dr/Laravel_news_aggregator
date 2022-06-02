@extends('layouts.admin')
@section('title') - Add news @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add news</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <h3>Adding news form</h3>
    @include('inc.messages')
    <form class="needs-validation" style = "width: 60%" method="post" action = "{{ route('admin.news.store') }}" novalidate>
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
            <label for="source_id" class="form-label">Source</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-dm example" id="source_id" name="source_id">
                @foreach($sources as $source)
                    <option value = {{ $source->id }} @if(old('source_id') === $source->id) selected @endif>{{ $source->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author"  value="{{ old('author') }}" required>
            <div class="invalid-feedback">
                Please enter an author.
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5">{!! old('description') !!}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-dm example" id="status" name="status">
                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
@push('js')
    <script src="{{ asset('js/validate-forms.js') }}"></script>
@endpush
