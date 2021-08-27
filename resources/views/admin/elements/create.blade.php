@extends('admin.layouts.includes.dashboard')
@section('content')
<div class="container mt-2">
    <div class="card">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Code</th>
            </tr>
        </thead>
        @foreach ($elements as $item)
        <tbody>
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->code}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->phonecode}}</td>
            </tr>
        </tbody>
    @endforeach 
    </table>
</div>
</div>
@endsection
