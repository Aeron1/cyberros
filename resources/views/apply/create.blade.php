@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="/applies" class="btn btn-primary btn-sm">Back</a>
    </div>
  <form action="/applies" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body" >
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="text" name="email">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" class="form-control" type="text" name="phone">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input id="address" class="form-control" type="text" name="address">
        </div>

        <div class="form-group">
            <label for="file">Upload CV</label>
            <input id="file" class="form-control-file" type="file" name="file" accept="application/pdf">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
  </form>
</div>
    
@endsection