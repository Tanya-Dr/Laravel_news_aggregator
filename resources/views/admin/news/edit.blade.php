@extends('layouts.admin')
@section('title') - Edit news @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit news</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <h3>Editing news form</h3>
    @include('inc.messages')
    <form id = "editForm" class="needs-validation" style = "width: 60%" method="post" action = "{{ route('admin.news.update', ['news' => $news]) }}" novalidate enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
            <div class="invalid-feedback">
                Please enter a title.
            </div>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-dm example" id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value = {{ $category->id }} @if($news->category_id === $category->id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="source_id" class="form-label">Source</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-dm example" id="source_id" name="source_id">
                @foreach($sources as $source)
                    <option value = {{ $source->id }} @if($news->source_id === $source->id) selected @endif>{{ $source->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author"  value="{{ $news->author }}" required>
            <div class="invalid-feedback">
                Please enter an author.
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5">{!! $news->description !!}</textarea>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $news->link }}">
        </div>
        <div class="mb-3">
            <label for="pub_date" class="form-label">Pub date</label>
            <input type="date" class="form-control" id="pub_date" name="pub_date" value="{{ $news->pub_date->format('Y-m-d') }}" style="width: fit-content;">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-dm example" id="status" name="status" style="width: fit-content;">
                <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if($news->image)
                <div style="margin-bottom: 0.5rem; display: flex; flex-direction: column; align-items: flex-start;" id="showImage">
                    <img src="{{ str_contains($news->image, 'https') ? $news->image : Storage::url($news->image) }}" style="width: 350px; margin-bottom: 0.5rem;" alt="{{ $news->slug }}">
                    <a href="javascript:;" class="delete btn btn-outline-danger">Delete image</a>
                </div>
            @endif
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
@push('js')
    <script src="{{ asset('js/validate-forms.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script>
        var route_prefix = "/filemanager";
    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        $('#description').ckeditor({
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelector(".delete");
            el.addEventListener('click', function() {
                document.querySelector('#showImage').style.display = "none";
                let newInput = document.createElement('input');
                newInput.type = "hidden";
                newInput.name = "delImage";
                newInput.value = "true";
                document.querySelector('#editForm').append(newInput);
            });
        });
    </script>
@endpush
