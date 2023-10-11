<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
  <title>Reset Password</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="{{ asset('assets/img/logo1.png') }}" rel="icon">
</head>

<body>
  <main class="w-100 d-flex justify-content-center" style="height: 100vh">
      <div class="w-75" style="margin-top: 200px">
            <div class="card">
              <div class="card-header">{{ __('Reset Password') }}</div>
              <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @endif
      
                <form method="POST" action="{{ route('password.email') }}">
                  @csrf
      
                  <div class="form-group mb-3">
                    <label for="email" class="mb-1">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                      value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
      
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Send Password Reset Link') }}
                    </button>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </main>

  <a class="btn btn-primary d-block position-absolute" href="/login" role="button" style="bottom: 20px; left: 20px; width: 120px;">Kembali</a>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>