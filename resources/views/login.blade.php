<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link href="{{asset('/tema/img/logo.png')}}" rel="icon">

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
                    <img class="align-content" src="{{ asset('style/images/logo.png') }}"
                        style="width:400px;height:200px;" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="login" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Username/email</label>
                        <input type="username" class="form-control" name="name" name="email" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="{{ route('password.request') }}">Forgotten Password?</a>
                        </label>

                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button><br>

                </form><br>
                <div class="register-link m-t-15 text-center">
                    <p>Don't have an account? <a href="register"> Sign Up Here</a></p>
                </div>
                <div class ="middle-text">
                    <hr>
                </div>

                <div class="social-logins">
                    <button type="button" class="input-google rounded-circle" onclick="window.location.href = '{{ route('auth.google') }}';">
                      <img src="tema/img/google.png" alt="Google">
                    </button>

                    <button class="input-facebook rounded-circle">
                      <img src="tema/img/facebook.png" alt="Facebook">
                    </button>
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
