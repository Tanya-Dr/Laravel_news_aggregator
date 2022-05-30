@extends('layouts.admin')
@section('title') - Sources @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sources list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary">Add source</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Count of news</th>
                <th scope="col">Url</th>
                <th scope="col">Type</th>
                <th scope="col">Created date</th>
                <th scope="col">Updated date</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sources as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->title }}</td>
                    <td>{{ $source->news_count }}</td>
                    <td>{{ $source->url }}</td>
                    <td>{{ $source->type }}</td>
                    <td>{{ $source->created_at }}</td>
                    <td>{{ $source->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.sources.edit', ['source' => $source]) }}" style="font-size: 12px;">Edit</a>&nbsp;
                        <a href="#" style="color:red; font-size: 12px;">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        No sources.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $sources->links() }}
    </div>
@endsection

