<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Loin Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 offset-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Admin Login
                    </div>

                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $e)
                            <div class="alert alert-danger">{{$e}}</div>
                            @endforeach
                        @endif
                    <form action="{{ url('/admin/login') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Enter Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>

                    <input type="submit" value="Login" class="btn btn-primary">
                </form>
                    </div>
                </div>
                
            </div>

        </div>

    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <style>
        .toastify{
            background-image: unset
        }
    </style>
    @if(Session('error'))
    <script>
        Toastify({
        text: '{{ Session('error') }}',
        className: "bg-danger",
        position : 'center'
        }).showToast();
    </script>
    @endif
</body>
</html>