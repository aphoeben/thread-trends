@extends('layouts.app')

@section('content')
<h4> {{ $item->name }} Details: </h4>

<img src="{{ asset('storage/products/'.$item->image) }}">
<p> Name: {{ $item->name }} </p>
<p> Description: {{ $item->description }} </p>
<p> Price: {{ $item->price }} </p>
<p> Section: {{ $item->section }} </p>
<p> QTY: {{ $item->qty }} </p>
<a href="/category/edit/{{ $item->id }}" class="btn btn-lg btn-success mt-3" type="button">Edit</a>
<a href="{{ route('category.index') }}" class="btn btn-lg btn-secondary mt-3">Back</a>
@endsection