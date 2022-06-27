@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/employees" class="btn btn-primary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <form action="/employees" method="post" enctype="multipart/form-data" >
                        @csrf
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
                            <label for="dob">Date of birth</label>
                            <input id="dob" class="form-control" type="date" name="dob">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" class="form-control-file" type="file" name="image">
                        </div>

      
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection