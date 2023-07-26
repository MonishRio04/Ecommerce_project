<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/145eb7de75.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        .container{
            width: fit-content;
            margin-top: 100px;
        }
        h3{
            color:rgb(84, 84, 84)
        }
    </style>
    <div class="container">
        <h3 class="text-center mb-4">Login</h3>
       <form method="POST" action="{{ route('login.custom') }}">
        {{-- {!! Form::open(['method'=>'POST','action'=>'route("login.custom")']) !!} --}}
        @csrf
            <div class="form-outline mb-4">
                {!! Form::email('email', null, ['placeholder'=>'Email','class'=>'form-control']) !!}
                {{-- {!! Form::email('email', null, ['placeholder'=>'Email','class'=>'form-control']) !!} --}}
                @error('email')
                <p style="color: red;font-size:12px">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-outline mb-4">
                {!! Form::password('password',['placeholder'=>'Password','class'=>'form-control']) !!}
                @error('password')
                <p style="color: red;font-size:12px;">*{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>
            </div>
            <div class="text-center">
            <button href="register.html" type="submit" class="btn btn-primary btn-block mb-4">Sign in</button></div>
            <div class="text-center">
                <p>Not a member? <a href="{{ route('register-user') }}">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
       </form>
    </div>
</body>

</html>
