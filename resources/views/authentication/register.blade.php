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
        <h3 class="text-center mb-4">Register</h3>
        <form autocomplete="off" action="{{ route('register.custom') }}" method="POST">
            @csrf
            <div class="form-outline mb-4">
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'User name']) !!}
                @error('name')
                <p style="color: red;font-size:10px;">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-outline mb-4">
                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
                @error('email')
                <p style="color: red;font-size:10px;">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-outline mb-4">
                {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Enter Password']) !!}
                @error('password')
                <p style="color: red;font-size:10px;">*{{ $message }}</p>
                @enderror
            </div>
            {{-- {!! Form::password($name, [$options]) !!} --}}
            <div class="form-outline mb-4">
                {!! Form::password('confirmPassword',  ['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
                @error('confirmPassword')
                <p style="color: red;font-size:10px;">*{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
            <button type="button" class="btn btn-default btn-block mb-4" onclick="history.back()" >Back</button>
        </div>
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
