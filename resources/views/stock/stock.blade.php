<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    </head>
    <body>
        <div class="container">
          <br />
          <form action="/stocks" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input id="name" class="form-control" type="text" name="name">
            </div>

            <div class="form-group">
              <label for="city">City</label>
              <input id="city" class="form-control" type="text" name="city">
            </div>
             <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
    </body>
</html>