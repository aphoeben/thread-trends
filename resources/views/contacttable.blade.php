@extends('layouts.app')

@section('content')
<div class="container my-4">

    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <h4 class="mb-8"> Customer Messages </h4>

    <div class="row my-1 g-0">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td scope="row">{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td> {{ $contact->message }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {!! $contacts->links() !!}
    </div>

</div>
</div>


@endsection