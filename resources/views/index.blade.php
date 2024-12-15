@extends('master')
@section('content')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td, th {
        border: 1px solid #ddd;
    }
</style>    
<table>
    <a href="{{ route('create', Crypt::encryptString($table)) }}">+ Add Data</a>
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->name }}</td>
                <td>
                    <a href="{{ route('edit', ['table' => Crypt::encryptString($table),'id' => Crypt::encryptString($d->id)]) }}">Edit</a>
                    <form action="{{ route('destroy', ['table' => Crypt::encryptString($table),'id' => Crypt::encryptString($d->id)]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection