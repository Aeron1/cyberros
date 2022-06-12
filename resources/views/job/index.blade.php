@extends('app')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1 class="m-0">Job Portal</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="get">
                    <div class="form-group">
                        <input id="search" class="form-control" type="text" name="search" placeholder="search" value="{{ request()->get('search')}}">
                        <button type="submit" class="btn btn-primary btn-sm my-2">Search</button>
                        <a href="/jobs" class="btn btn-danger btn-sm">Refresh Button</a>
                    </div>
                </form>
                <h2 class="">Create, Edit and view Job</h2>
                <a href="/jobs/create" class="btn btn-primary btn-sm">Create</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Job Description</th>
                            <th>Job Type</th>
                            <th>Name of the Company</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $index => $job)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->content }}</td>
                            <td>{{ $job->type }}</td>
                            <td>{{ $job->company }}</td>
                            <td>
                                <form action="/jobs/{{ $job->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="/jobs/{{ $job->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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