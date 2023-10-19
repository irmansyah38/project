<!doctype html>
<html lang="en">

<head>
    <title>Masuk</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        #loginBtn,
        #registerBtn {
            cursor: pointer;
        }

        body {
            background-image: url(assets/img/fotocurug2.jpg);
            background-size: cover;
        }

        .main {
            background-color: rgba(0, 0, 0, 0.6)
        }
        .lebar{
            max-width: 60%;
            min-width: 385px;
        }
    </style>

</head>

<body>



    <main class="w-100 main" style="height: 100vh;">

    </main>

    <div class="container position-absolute top-50 start-50 translate-middle">
        <div id="loginForm" class="bg-light p-3 rounded lebar mx-auto">
            <form action="/login" method="POST">
                <h2 class="text-center">Log in</h2>
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>{{ session('loginError') }}</strong>
                    </div>
                @endif

                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="user_name" aria-describedby="helpId"
                        placeholder="Username" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password"
                        aria-describedby="helpId" placeholder="Masukan kata sandi" required autocomplete="off">
                </div>

                <div class="mb-3 row">
                    <div class="form-check col">
                        <input class="form-check-input ms-1" type="checkbox" value="remember" id="remember">
                        <label class="form-check-label text-muted ms-1" for="remember">
                            Remember me
                        </label>
                    </div>

                    <div class="col text-end">
                        <a href="/forgot-password" class="font-weight-bold text-decoration-none me-3">Forgot
                            password?</a>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="mx-auto btn btn-primary btn-block d-block login w-50">Login</button>
                </div>

            </form>

            <div class="mt-3">
                <p class="text-muted text-center"><span id="registerBtn" class="text-primary">Daftar</span> |
                    Kembali ke <a href="/" class="text-decoration-none">halaman utama</a></p>
            </div>

        </div>



        <div id="registerForm" class="d-none bg-light p-3 rounded lebar mx-auto">

            <form action="/register" method="POST">

                <h2 class="text-center">Daftar</h2>
                @if (session()->has('signUpComplete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>{{ session('signUpComplete') }}</strong>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        Gagal membuat akun !!
                    </div>
                @endif
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control border border-2 @error('name') is-invalid @enderror"
                        name="name" id="name" aria-describedby="helpId" placeholder="" autofocus
                        value="{{ old('name') }}" autocomplete="off">
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
                        value="{{ old('user_name') }}" autocomplete="off">
                    @error('user_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                        class="form-control border border-2 @error('email') is-invalid @enderror" name="email"
                        id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com"
                        value="{{ old('email') }}" autocomplete="off">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nomor" class="form-label">Nomor</label>
                    <input type="number"
                        class="form-control border border-2 @error('nomor') is-invalid @enderror" name="nomor"
                        id="nomor" aria-describedby="helpId" placeholder="08.." value="{{ old('nomor') }}"
                        autocomplete="off">
                    @error('nomor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password1" class="form-label">Password</label>
                    <input type="password"
                        class="form-control border border-2 @error('password') is-invalid @enderror"
                        name="password" id="password1" placeholder="">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input type="password"
                        class="form-control border border-2 @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" id="password_confirmation" placeholder="">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="mx-auto btn btn-primary btn-block d-block login w-50">Daftar</button>
                </div>

            </form>

            <div class="mt-3">
                <p class="text-muted text-center"><span id="loginBtn" class="text-primary">Login</span> |
                    Kembali ke <a href="/" class="text-decoration-none">halaman utama</a></p>
            </div>

        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script type='text/javascript'>
        // Sembunyikan formulir "Daftar" saat halaman dimuat
        document.getElementById("registerForm").classList.add("d-none");

        document.getElementById("loginBtn").addEventListener("click", function() {
            document.getElementById("loginForm").classList.remove("d-none");
            document.getElementById("registerForm").classList.add("d-none");
        });

        document.getElementById("registerBtn").addEventListener("click", function() {
            document.getElementById("loginForm").classList.add("d-none");
            document.getElementById("registerForm").classList.remove("d-none");
        });
    </script>
</body>

</html>
