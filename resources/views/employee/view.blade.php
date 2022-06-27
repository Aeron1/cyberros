<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            {{-- <form action="/employees/{{ $employee->id }}/edit" method="post">
                @csrf
                @method('put') --}}
                <div class="card">
                
                    <div class="card-header">
                        <a href="{{route('downloadPDF', $employee->id)}}" class="btn btn-primary btn-sm">Download</a>
                        <a href="/employees/create">Create</a>
                    </div>
                    <div class="card-body">
                            <img src={{ asset($employee->image) }} alt="" width="100px">
                           <p>{{ $employee->name }}</p>
                           <p>{{ $employee->email }}</p>
                        
                       
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</body>
</html>