<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>eGP Stores</title>
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/bootstrap-social/bootstrap-social.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('assets/img/egp_logo.png')}}'/>
<style>
        .login-image {
        background-image: url('assets/img/image-gallery/10.png');
        background-size: cover;
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        color: white;
        }
</style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
        <div class="row">
            <div class="col-md-6 login-image">
                <h1>Welcome</h1>
            </div>

            <div class="col-md-4" style=" margin:8.5em">
                 <h3 style="color:navy">
                    <img src="{{asset('assets/img/egp_logo.png')}}" width="15%">
                    Stores
                </h3>
                {{-- <h1>Welcome</h1> --}}
                <div class="card card-primary">
                    <div class="card-header">
                      <h4>Forgot Your Password?</h4>

                    </div>

                    <div class="card-body">

                        @if (session('status_error'))
                        <p class="text-danger">
                            {{ session('status_error') }}
                        </p>
                        @endif

                        @if (session('status_ok'))
                        <p class="text-success">
                            {{ session('status_ok') }}
                        </p>
                        @endif

                      <form method="POST" action="{{ route('forgot_password_email') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <p class="text-center" style="color: navy">We will send a link to reset your password</p>

                          <label for="email">Email</label>
                          <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                          <div class="invalid-feedback">
                            Please fill in your email
                          </div>
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-light btn-lg btn-block" tabindex="4">
                            Submit Request
                          </button>
                        </div>
                      </form>
                      <div class="float-right">
                        <a href="{{route('welcome')}}" class="text-small">
                         Back to Login
                        </a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </section>
  </div>

  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>
