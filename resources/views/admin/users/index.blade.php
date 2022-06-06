@extends('layouts.admin')
@section('title') - Users @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users list</h1>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Is admin</th>
                <th scope="col">Created date</th>
                <th scope="col">Updated date</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form id="update-form-{{ $user->id }}" method="post" action = "{{ route('admin.users.update', ['user' => $user]) }}">
                            @method('put')
                            @csrf
                            <select name="is_admin" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" style="width: 45%;" onchange="event.preventDefault();
                                                 document.getElementById('update-form-{{ $user->id }}').submit();">
                                <option value="1" @if($user->is_admin === true) selected @endif>Yes</option>
                                <option value="0" @if($user->is_admin !== true) selected @endif>No</option>
                            </select>
                        </form>
                    </td>
                    <td>@if($user->created_at) {{ $user->created_at->format('d-m-Y H:i') }} @endif</td>
                    <td>@if($user->updated_at) {{ $user->updated_at->format('d-m-Y H:i') }} @endif</td>
                    <td>
                        <a href="javascript:;" style="color:red; font-size: 12px;" class="delete" rel="{{ $user->id }}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No users</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $users->links() }}
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
                        send('/admin/users/' + id).then(() => {
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
