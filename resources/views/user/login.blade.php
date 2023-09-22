<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif
        }

        body {
            height: 100vh;
            background: url('assets/img/terjun.jpg');
            overflow: hidden;
        }

        .container {
            margin: auto;
        }

        .panel-heading {
            text-align: center;
            margin-bottom: 10px
        }

        #forgot {
            min-width: 100px;
            margin-left: auto;
            text-decoration: none
        }

        a:hover {
            text-decoration: none
        }

        .form-inline label {
            padding-left: 10px;
            margin: 0;
            cursor: pointer
        }

        .btn.btn-primary {
            margin-top: 20px;
            border-radius: 15px
        }

        .panel {
            min-height: 380px;
            border-radius: 12px
        }

        .input-field {
            border-radius: 5px;
            padding: 5px;
            display: flex;
            align-items: center;
            cursor: pointer;
            border: 1px solid #ddd;
            color: #4343ff
        }

        input[type='text'],
        input[type='password'] {
            border: none;
            outline: none;
            box-shadow: none;
            width: 100%
        }

        .fa-eye-slash.btn {
            border: none;
            outline: none;
            box-shadow: none
        }

        img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            position: relative
        }

        a[target='_blank'] {
            position: relative;
            transition: all 0.1s ease-in-out
        }

        .bordert {
            border-top: 1px solid #aaa;
            position: relative
        }

        .bordert:after {
            content: "or connect with";
            position: absolute;
            top: -13px;
            left: 33%;
            background-color: #fff;
            padding: 0px 8px
        }

        @media(max-width: 360px) {
            #forgot {
                margin-left: 0;
                padding-top: 10px
            }

            body {
                height: 100%
            }

            .container {
                margin: 30px 0
            }
        }
    </style>
    <title>{{ $title }}</title>
</head>

<body>

    <div style="width: 100vw; height: 100vh; background: rgba(0, 0, 0, .5); margin: 0; padding: 0;">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                    <div class="panel border bg-white mt-5">
                        <div class="panel-heading">
                            <h3 class="pt-3 font-weight-bold">Login</h3>
                        </div>
                        <div class="panel-body p-3">
                            @if (session()->has('success'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ session('success') }}</strong>

                                </div>
                            @endif

                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ session('loginError') }}</strong>
                                </div>
                            @endif

                            <form action="/login" method="POST">
                                @csrf
                                <div class="form-group py-2">
                                    <div class="input-field"> <span class="far fa-user p-2"></span> <input
                                            type="text" placeholder="Username" required name="user_name"> </div>
                                </div>
                                <div class="form-group py-1 pb-2">
                                    <div class="input-field"> <span class="fas fa-lock px-2"></span> <input
                                            type="password" placeholder="Enter your Password" required name="password">
                                        <button class="btn bg-white text-muted"> <span class="far fa-eye-slash"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-inline"> <input type="checkbox" name="remember" id="remember">
                                    <label for="remember" class="text-muted">Remember me</label> <a href="#"
                                        id="forgot" class="font-weight-bold">Forgot password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                                <div class="text-center pt-4 text-muted">Don't have an account? <a href="/register">Sign
                                        up</a> | <a href="/">Home</a></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert)
        })
    </script>
</body>

</html>
