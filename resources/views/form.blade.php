<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Google Recaptcha</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script> 
    </head>
    <body>
        <div class="container">
            <h1>reCAPTCHA Code in Laravel</h1>
            <p>Launching soon {{ timeElapsedString(date('2021-12-01 23:59:59', true)) }}</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('submit') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="Email">Email:</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="Password">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="ReCaptcha">Recaptcha:</label>
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>