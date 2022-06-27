@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="/employees/create" class="btn btn-primary btn-sm">Create</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $index=> $data)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->dob }}</td>
                            <td><img src="{{ asset($data->image) }}" alt="" width="90px"></td>
                            <td>
                                <form action="/employees/{{ $data->id }}" method="post">
                                    @csrf
                                   
                                    <a href="/employees/{{ $data->id }}" class="btn btn-primary btn-sm">View</a>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection