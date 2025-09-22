<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Absensi Pegawai Honorer Dinas Perpustakaan Kab. Kampar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #0d3ddb; /* biru tua sesuai desain */
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      background: #fff;
      border-radius: 30px;
      overflow: hidden;
      max-width: 900px;
      width: 100%;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    .login-left {
      padding: 3rem;
    }
    .login-left h3 {
      font-weight: 700;
    }
    .form-control {
      border-radius: 50px;
      padding-left: 1rem;
    }
    .btn-login {
      border-radius: 50px;
      background: #0d3ddb;
      color: #fff;
      font-weight: 500;
    }
    .btn-login:hover {
      background: #0b32b1;
      color: #fff;
    }
    .login-right {
      background: url("{{ asset('/storage/asset/asset.jpg') }}") no-repeat center center/cover;
      min-height: 400px;
    }
    .social-login img {
      width: 40px;
      height: 40px;
      margin: 0 10px;
      cursor: pointer;
    }
  </style>

</head>

<body>
  <div class="login-card row g-0">
    <div class="col-md-6 login-left d-flex flex-column justify-content-center">
      <div class="text-center mb-4">
        <img src="" alt="">
        <h3 class="mt-3">Selamat Datang</h3>
        <p class="text-muted">Di Sistem Absensi Dinas Perpustakaan & Kearsipan Kab. Kampar</p>
      </div>
      <form action="">
        <div class="mb-3">
          <input type="text" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-login w-100 py-2" type="submit">Login</button>
      </form>
    </div>
    <div class="col-md-6 login-right"></div>
  </div>
  
  @if ($errors->any()) {
    <div class="alert alert-danger mt-3">{{ $errors->first() }}</div>
  }
  
  @endif



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>