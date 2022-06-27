@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Wishlist Section</div>
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
                
            @endif
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name of the Job</th>
                        <th>Job Type</th>
                        <th>Company</th>
                    </tr>

                </thead>
                <tbody>
                    @if (Auth::user()->wishlist->count())
                    @foreach ($wishlist as $index=> $wishlist)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $wishlist->job->title }}</td>
                        <td>{{ $wishlist->job->type }}</td>
                        <td>{{ $wishlist->job->company }}</td>
                    </tr>

                        
                    @endforeach
                        
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection