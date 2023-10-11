<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ asset('assets/img/logo1.png') }}" rel="icon">
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
            overflow: hidden;
            background-image: url('assets/img/terjun.jpg');
        }

        .container {
            margin: auto
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
            /* box-shadow: 20px 20px 80px rgb(218, 218, 218); */
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
                    <div class="panel border bg-white mt-3">
                        <div class="panel-heading">
                            <h3 class="pt-3 font-weight-bold">Sign Up</h3>
                        </div>
                        <div class="panel-body p-3">
                            <form action="/register" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text"
                                        class="form-control border border-2 @error('name') is-invalid @enderror"
                                        name="name" id="name" aria-describedby="helpId" placeholder="" autofocus
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="user_name" class="form-label">User Name</label>
                                    <input type="text"
                                        class="form-control border border-2 @error('user_name') is-invalid @enderror"
                                        name="user_name" id="user_name" aria-describedby="helpId" placeholder=""
                                        value="{{ old('user_name') }}">
                                    @error('user_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email"
                                        class="form-control border border-2 @error('email') is-invalid @enderror"
                                        name="email" id="email" aria-describedby="emailHelpId"
                                        placeholder="abc@mail.com" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nomor" class="form-label">Nomor</label>
                                    <input type="text"
                                        class="form-control border border-2 @error('nomor') is-invalid @enderror"
                                        name="nomor" id="nomor" aria-describedby="helpId" placeholder=""
                                        value="{{ old('nomor') }}">
                                    @error('nomor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control border border-2 @error('password') is-invalid @enderror"
                                        name="password" id="password" placeholder="">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm password</label>
                                    <input type="password" class="form-control border border-2 @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                        id="password_confirmation" placeholder="">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mt-3">Create</button>

                                <div class="text-center pt-4 text-muted">If you have account <a href="/login">Login</a>
                                    | <a href="/">Home</a></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
