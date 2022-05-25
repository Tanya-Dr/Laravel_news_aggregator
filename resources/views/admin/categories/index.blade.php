@extends('layouts.admin')
@section('title') - Categories @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Add category</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Created date</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" style="font-size: 12px;">Edit</a>&nbsp;
                        <a href="#" style="color:red; font-size: 12px;">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        No categories.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
