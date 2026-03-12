<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAP Bandarsono</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('storage/assets/images/logos/siap.png') }}" />
  <link rel="stylesheet" href="{{ asset('storage/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('storage/assets/images/logos/siap.png') }}" alt="" style="width:150px;">
                </a>
                
                @if(!isset($step))

                <form method="POST" action="{{ route('login.post') }}">
                  @csrf

                  <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>

                  <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>

                  <button class="btn btn-primary w-100">Login</button>

                </form>

                @endif

                @if(isset($step) && $step == 'setup2fa')

                <h5 class="text-center">Aktifkan 2FA</h5>

                <p class="text-center">
                Scan QR Code menggunakan Google Authenticator
                </p>

                <div class="text-center mb-3">
                {!! $QR_Image !!}
                </div>

                <form method="POST" action="{{ route('login.post') }}">
                @csrf

                  <div class="mb-3">
                  <label>Kode OTP</label>
                  <input type="text" class="form-control" name="otp" required>
                  </div>

                  <button class="btn btn-success w-100">Aktifkan 2FA</button>

                </form>

                @endif

                @if(isset($step) && $step == 'verify2fa')

                <h5 class="text-center">Verifikasi 2FA</h5>

                <p class="text-center">
                Masukkan kode dari Google Authenticator
                </p>

                <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-3">
                <label>Kode OTP</label>
                <input type="text" class="form-control" name="otp" required>
                </div>

                <button class="btn btn-primary w-100">Verifikasi</button>

                </form>

                @endif
<!-- 
                @if(isset($step) && $step == 'setup2fa')

                <h5 class="text-center">Aktifkan 2FA</h5>

                <p class="text-center">
                Scan QR Code menggunakan Google Authenticator
                </p>

                <div class="text-center mb-3">
                {!! $QR_Image !!}
                </div>

                <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-3">
                <label>Kode OTP</label>
                <input type="text" class="form-control" name="otp" required>
                </div>

                <button class="btn btn-success w-100">Aktifkan 2FA</button>

                </form>

                @endif -->
                <!-- <form method="POST" action="{{ route('login.post') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fs-4 mb-4">Login</button>
                </form> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('storage/assets/css/styles.min.css') }}"></script>
  <script src="{{ asset('storage/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('storage/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>