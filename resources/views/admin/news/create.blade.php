@extends('layouts.admin')
@section('title') - add News @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add news</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="table-responsive">
        <h3>Adding news form</h3>
        <form style = "width: 60%">
            <div class="mb-3">
                <label for="titleInput" class="form-label">Title</label>
                <input type="text" class="form-control" id="titleInput">
            </div>
            <div class="mb-3">
                <label for="fullInfo" class="form-label">Full info</label>
                <textarea class="form-control" id="fullInfo" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="shortInfo" class="form-label">Short Info</label>
                <textarea class="form-control" id="shortInfo" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
