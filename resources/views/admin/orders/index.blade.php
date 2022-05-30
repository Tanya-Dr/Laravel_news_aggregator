@extends('layouts.admin')
@section('title') - Orders @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.orders.create') }}" class="btn btn-sm btn-outline-secondary">Add order</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">User name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">info</th>
                <th scope="col">Created date</th>
                <th scope="col">Updated date</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->info }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.orders.edit', ['order' => $order]) }}" style="font-size: 12px;">Edit</a>&nbsp;
                        <a href="#" style="color:red; font-size: 12px;">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        No orders.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
@endsection

