@extends('layouts.app')

@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<h4 class="mb-8"> Users </h4>

<div class="row my-1 g-0">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td> {{ $user->is_admin ? 'Admin' : 'Customer' }}</td>
                <td>
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="is_admin" value="{{ $user->is_admin ? '0' : '1' }}">
                        @if(Auth::user()->id != $user->id)
                        <button type="submit" class="{{ $user->is_admin ? 'btn btn-danger' : 'btn btn-primary' }}">
                            {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                        </button>
                        @else
                        <button type="submit" class="{{ $user->is_admin ? 'btn btn-danger' : 'btn btn-primary' }}"
                            disabled>
                            {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                        </button>
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {!! $users->links() !!}
</div>

</div>

@endsection