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
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Count of news</th>
                <th scope="col">Description</th>
                <th scope="col">Created date</th>
                <th scope="col">Updated date</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->news_count }}</td>
                    <td>{{ $category->description }}</td>
                    <td>@if($category->created_at) {{ $category->created_at->format('d-m-Y H:i') }} @endif</td>
                    <td>@if($category->updated_at) {{ $category->updated_at->format('d-m-Y H:i') }} @endif</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $category]) }}" style="font-size: 12px;">Edit</a>&nbsp;
                        <a href="javascript:;" style="color:red; font-size: 12px;" class="delete" rel="{{ $category->id }}">Delete</a>
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

        {{ $categories->links() }}
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function(value, key) {
                value.addEventListener('click', function() {
                    const id = this.getAttribute('rel');
                    let str = 'Подтвердите удаление записи с #ID ' + id;
                    if(confirm(str)) {
                        send('/admin/categories/' + id).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
