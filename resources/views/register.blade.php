<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.jpeg">
  <link rel="icon" type="image/png" href="assets/img/logo.jpeg">
  <title>Register</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets/css/argon-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>

<body class="">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('assets/img/stmik.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Please Register Your Username and Password</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register Members</h5>
            </div>
            <div class="row px-xl-5 px-sm-4 px-3">
              <div class="card-body">
                {{-- @error($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{Session::get('message')}}
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
                    <div class="mb-3">
                      <input name="phone" type="number" value="{{ old('phone') }}" class="form-control form-control-lg" placeholder="Enter Your Phone">
                      @error('phone')
                        <span class="text-danger">{{ $message }}</span> 
                      @enderror
                    </div>
                    <div class="mb-3">
                      <textarea name="address" rows="2" value="{{ old('address') }}" class="form-control form-control-lg" placeholder="Enter Your Address"></textarea>
                      @error('address')
                        <span class="text-danger">{{ $message }}</span> 
                      @enderror
                    </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Register Now</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Already have an account ? Please <a href="login" class="text-dark font-weight-bolder"> Login Here</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
                © <script>
                    document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                 Teguh Bagas.
            </div>
          </p>
        </div>
      </div>
    </div>
  </footer>
  
</body>

</html>