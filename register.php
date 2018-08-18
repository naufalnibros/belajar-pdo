<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row" style="margin-top:15%">
      <div class="col-md-12">
        <!-- Start form -->
        <form method="post" action="proses/register.php">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Enter Your Name">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
          </div>
        </form>
        <a class="btn btn-success btn-block" href="register.php">LOGIN</a>
        <!-- End form -->
      </div>
    </div>
  </div>
</body>
</html>
