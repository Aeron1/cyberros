@extends('app')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">Applied List</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="/applies/create" class="btn btn-primary btn-sm">create</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>CV</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applies as $index=> $applies)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $applies->name }}</td>
                        <td>{{ $applies->email }}</td>
                        <td>{{ $applies->phone }}</td>
                        <td>{{ $applies->address }}</td>
                        <td>
                            <a href="{{ asset($applies->file) }}" class="btn btn-primary" target="__blank">CV</a>
                        </td>
                        <td>
                            <form action="/applies/{{ $applies->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection