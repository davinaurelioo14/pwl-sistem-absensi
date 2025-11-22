<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In Form</title>
  <link rel="stylesheet" href="pwl-sistem-absensi/signinn.css">
</head>
<body>
  <div class="container">
    <div class="form-section">
      <h2>Sign In</h2>
      <form method="POST" action="actions/auth/login.php">
        <input name="email" type="email" placeholder="Email">
        <input name="password" type="password" placeholder="Password">
        <button name="login" type="submit" class="btn-signin">Sign In</button>
      </form>
    </div>
    <div class="info-section">
      <h2>Hi There !</h2>
      <p>If you dont have account</p>
      <a href="pwl-sistem-absensi/signup.php"><button class="btn-signup">Sign Up</button></a>
    </div>
  </div>
  <script src="signinn.js"></script>
</body>
</html>