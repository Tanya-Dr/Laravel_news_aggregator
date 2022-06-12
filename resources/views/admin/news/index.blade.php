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
        @include('inc.messages')
        <table class="table table-striped table-sm" style="table-layout: fixed;">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Category</th>
                <th scope="col">Source</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Image(url)</th>
                <th scope="col">Description</th>
                <th scope="col">Link</th>
                <th scope="col">Status</th>
                <th scope="col">Pub date</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->id }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->category->title }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->source->title }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->title }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->author }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->image }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->description }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->link }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $news->status }}</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">@if($news->pub_date) {{ $news->pub_date->format('d-m-Y H:i') }} @endif</td>
                    <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        <a href="{{ route('admin.news.edit', ['news' => $news]) }}" style="font-size: 12px;">Edit</a>&nbsp;
                        <a href="javascript:;" style="color:red; font-size: 12px;" class="delete" rel="{{ $news->id }}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No news</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $newsList->links() }}
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
                        send('/admin/news/' + id).then(() => {
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
