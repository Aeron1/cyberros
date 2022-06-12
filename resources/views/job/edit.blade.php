@extends('app')
@section('content')
<form action="/jobs/{{ $job->id }}" method="post">
    @csrf
    @method('put')
   <div class="card">
    <div class="card-header">Creating Job Portal</div>
    <a href="/jobs" class="btn btn-primary btn-sm">Back</a>
    <div class="card-body">
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" class="form-control" type="text" name="title" value="{{ $job->title }}">
        </div>
    
        <div class="form-group">
            <label for="content">Content</label>
            <input id="content" class="form-control" type="text" name="content" value="{{ $job->content }}" >
        </div>
    
        <div class="form-group py-2">
            <label for="type">JobType</label>
            <select name="type" id="type">
                <option value="fulltime">Fulltime</option>
                <option value="partime">Partime</option>
    
            </select>
        </div>
    
        <div class="form-group py-2">
            <label for="company">Name of the company</label>
            <input id="company" class="form-control" type="text" name="company" value="{{ $job->company }}">
        </div>
    
    </div>
    <button type="submit" class="btn btn-primary btn-sm">update</button>
   </div>
    
</form>
    
@endsection