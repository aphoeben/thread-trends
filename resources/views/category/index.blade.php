@extends('layouts.app')

@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<h4> Inventory </h4>
<div class="text-right">
    <a href="/create-new-category" class="btn btn-sm btn-dark mb-3" type="button">Add Product</a>
</div>

<div class="row my-1 g-0">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Section</th>
                <th scope="col">QTY</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat_data)
            <div class="col-md-4 mt-3">
                <form method="POST" action="{{ url('delete/'.$cat_data->id) }}">
                    @method("DELETE")
                    @csrf

                    <tr>
                        <td scope="row">{{ $cat_data->id }}1</td>
                        <td><img src="{{ asset('storage/products/'.$cat_data->image) }}" class="img-fluid" width="90">
                        </td>
                        <td>{{ $cat_data->name }}</td>
                        <td>{{ $cat_data->description }}</td>
                        <td> {{ $cat_data->section }}</td>
                        <td> {{ $cat_data->qty }}</td>
                        <td>Php {{ $cat_data->price }}</td>
                        <td><a type="button" href="/category/{{ $cat_data->id }}"
                                class="btn btn-sm btn-primary mb-3">View</a>
                            <button class="btn btn-sm btn-danger mb-3" type="submit">Delete </a>
                        </td>
                    </tr>
                    @endforeach
        </tbody>
    </table>

    </form>
</div>
<div class="d-flex justify-content-center">
    {!! $categories->links() !!}
</div>

</div>



@endsection