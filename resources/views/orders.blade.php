@extends('layouts.app')

@section('content')
<div class="container my-4">

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <h4 class="mb-8"> Orders </h4>

    <div class="row my-1 g-0">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Order Date and Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td scope="row">{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>₱{{ number_format($order->total_price,2) }}</td>
                    <td> {{ $order->status }}</td>
                    <td> {{ $order->created_at }}</td>
                    <td>
                        <form method="POST" action="{{ url('orders/complete/'.$order->id) }}">
                            @csrf
                            <button class="btn btn-sm btn-primary mb-3" type="submit"
                                {{ $order->status != 'pending' ? 'disabled' : '' }}>Complete</button>
                        </form>
                        <form method="POST" action="{{ url('orders/cancel/'.$order->id) }}">
                            @csrf
                            <button class="btn btn-sm btn-danger mb-3" type="submit"
                                {{ $order->status != 'pending' ? 'disabled' : '' }}>Cancel</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {!! $orders->links() !!}
    </div>

</div>
</div>


@endsection