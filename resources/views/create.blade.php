@extends('master')
@section('content')
    <form action="{{ route('store', Crypt::encryptString($table)) }}" method="POST">
        @csrf
        <input type="text" name="name" required>
        <button type="submit">Submit</button>
    </form>
@endsection