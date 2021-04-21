<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>Login | SPP-Ku</title>
  
  {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon.png')}}"> --}}

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand mb-3 mt-5">
              <h1>SPP-Ku</h1>
            </div>

            <div class="card">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" >
                    @csrf
                  <div class="form-group">
                    <label for="username">{{ __('username') }}</label>
                    <input id="keyword" type="text" class="form-control @error('keyword') is-invalid @enderror" name="keyword" value="{{ old('keyword') }}" autocomplete="keyword" autofocus>
                        @error('keyword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block d-flex justify-content-between align-items-center">
                      <label for="password" class="control-label mb-0">{{ __('Password') }}</label>
                      {{-- @if (Route::has('password.request')) --}}
                        <a class="btn btn-link" href="">
                          {{ __('Lupa Password?') }}
                        </a>
                      {{-- @endif --}}
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                         @error('password')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn text-white btn-lg btn-block" tabindex="4" style="background-color: #540b0e;">
                        {{ __('Login') }}
                    </button>
                  </div>
                </form>

              </div>
            </div>
            {{-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="{{ route('register') }}">Create One</a>
            </div> --}}
            <div class="simple-footer">
              Copyright &copy; SPP-Ku 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
</body>
</html>


