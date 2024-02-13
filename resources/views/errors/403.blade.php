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
        <div class="container mt-5">
          <div class="page-error">
            <div class="page-inner">
              <h1>404</h1>
              <div class="page-description">
                You do not have access to this module.
              </div>
              <div class="page-search">
                <div class="mt-3">
                  <a href="{{route('home')}}">  <i data-feather="corner-up-left"></i> Back to Home</a>
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
