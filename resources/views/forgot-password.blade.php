<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password</title>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link href="{{ asset('/tema/img/logo.png') }}" rel="icon">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-white">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="">
                    <img class="align-content" src="{{ asset('style/images/logo.png') }}" style="width:400px;height:200px;" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Send Password Reset Link</button>
                </form>
                <div class="register-link m-t-15 text-center">
                    <p>Remembered your password? <a href="{{ route('login') }}">Sign in here</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
</body>

</html>
