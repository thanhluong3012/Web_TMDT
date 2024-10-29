
<!DOCTYPE html>
<html lang="en">
<head>
    @include('css')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  {{-- <div class="login-logo">
    <a href="#"><b>Đăng nhập</b></a>
  </div> --}}
  <!-- /.login-logo -->
  
  <div class="card">
    <div class="card-body login-card-body">
      <h1 class="login-box-msg">Đăng kí</h1>
      <form action="{{ route('register') }}" method="post">
        @csrf    <!-- để bảo mật -->
        <div class="input-group mb-3">
          <input value="" type="text" name="name_register" class="form-control" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('name_register')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <div class="input-group mb-3">
            <input value="" type="text" name="email_register" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
        </div>

        @error('email_register')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        @error('password')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          @error('password')
            <p style="color: red">{{ $message }}</p>
        @enderror
  
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register Now</button>
          </div>
        </div>
        <div class="row mt-2">
            <div class="text-center mt-10">
                
              <p class="m-0">Or <a href="{{ route('admin.login') }}">Login</a></p>
            </div>
          </div>
        @csrf
      </form>

    </div>
  </div>
</div>


<!-- /.login-box -->

    @include('footer')

</body>
</html>
