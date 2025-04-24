<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
        <div class="container">
            <div class="row justify-content-center">
                    <div class="col-md-6 mt-3">
                        <h2 class="text-dark text-center mt-4">Register Now</h2>
                        <div class="card mt-3">
                            <div class="card-header bg-warning">
                              
                               <p class="text-light">Register-form</p>
                            </div>
                            <div class="card-body">
                                <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="name" ><b>Name*</b></label>
                                        <input type="text" name="name" class="form-control" placeholder="name..">
                                        @error('name')
                                            <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="email" class="text-dark"><b>Email*</b></label>
                                        <input type="text" name="email" class="form-control" placeholder="email..">
                                        @error('email')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="name" class="text-dark"><b>Password*</b></label>
                                        <input type="password" name="password" class="form-control" placeholder="password..">
                                        @error('password')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="name" class="text-dark"><b>Confirm Password*</b></label>
                                        <input type="password" name="c_password" class="form-control" placeholder="password..">
                                        @error('c_password')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <button type="submit"class="btn btn-success btn-md w-100" >submit</button>
                                        <a href="{{route('login.form')}}" class="btn btn-primary w-100 mt-2">Login</a>
                                    </div>
                                    
                                </form>       
                            </div>
                          
                        </div>
                    </div>
            </div>
        </div>
    
</body>
</html>
