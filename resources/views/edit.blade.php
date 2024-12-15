@extends('master')
@section('content')
    <form action="{{ route('update', ['table' => Crypt::encryptString($table), 'id' => Crypt::encryptString($data->id)]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $data->name }}">
        <button type="submit">Save</button>
    </form>
@endsection