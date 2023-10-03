<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Verify Email</title>
</head>

<body>
  <div class="container">
    <h1>Verify Email</h1>

    <p>Please click the link below to verify your email address:</p>

    <a href="{{ url('api/email/verify', $token) }}">Verify Email</a>
  </div>
</body>

</html>