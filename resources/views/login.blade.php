<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/logo.jpeg') }}">
  <link rel="icon" type="image/png" href="{{ asset('/assets/img/logo.jpeg') }}">
  <title>KAPERPUS</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    
    <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets/css/argon-dashboard.css?v=2.0.0') }}" rel="stylesheet" /> 
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  
                  <h4 class="font-weight-bolder">Log in</h4>
                  <p class="mb-0">Welcome to <b>KAPERPUS</b><br>Please enter your <b>USERNAME</b> and <b>PASSWORD</b></p>
                </div>
                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                      <center>{{Session::get('message')}} </center>
                    </div>
                  @endif
                  <form role="form" method="POST" action="">
                    @csrf
                    <div class="mb-3">
                      <input name="username" type="text" value="{{ old('username') }}" class="form-control form-control-lg" placeholder="Enter Your Username">
                      @error('username')
                      <span class="text-danger">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input name="password" type="password" class="form-control form-control-lg" placeholder="Enter Your Password" aria-label="Password">
                      @error('password')
                      <span class="text-danger">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Log in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account ? Please
                    <a href="register" class="text-primary text-gradient font-weight-bold">Register Here</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden opacity-9" style="background-image: url('assets/img/stmik.jpg');
          background-size: cover;">
                <span class="mask  opacity-6"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
 
</body>

</html>