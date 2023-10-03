<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h1 class="text-center">Reset Password</h1>
          </div>
          <div class="card-body">
            <form action="{{ route('password.update') }}" method="post">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <input type="hidden" name="email" value="{{ $_GET['email'] }}">
              <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="New Password"
                  required>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                  placeholder="Confirm Password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>