@extends('layouts.admin')
@section('title') - News @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Add news</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Image(url)</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Created date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($newsList as $news)
                <tr>
                    <td>{{ $news['id'] }}</td>
                    <td>{{ $news['idCategory'] }}</td>
                    <td>{{ $news['title'] }}</td>
                    <td>{{ $news['author'] }}</td>
                    <td>{{ $news['image'] }}</td>
                    <td>{{ $news['description'] }}</td>
                    <td>ACTIVE</td>
                    <td>{{ $news['created_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
