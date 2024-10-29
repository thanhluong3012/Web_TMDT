
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
      <h1 class="login-box-msg">Đăng nhập</h1>
      <form action="{{ route('login') }}" method="post">
        @csrf    <!-- để bảo mật -->
        <div class="input-group mb-3">
          <input value="{{ old('email') }}" type="text" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        @error('email')
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

        
        <div class="row">
            <div class="col-7 icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
            <div class="col-5 ">
              <!-- Simple link -->
              <a href="#!">Quên mật khẩu?</a>
            </div>
    
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
          </div>
        </div>
        <div class="row mt-2">
          <div class="text-center mt-10">
            <p class="m-0">Not a member? <a href="{{ route('admin.register') }}">Đăng kí</a></p>
          </div>
        </div>
        @csrf
      </form>

      @if(session('error'))
        <script>
          alert('{{ session('error') }}');
        </script>
      @endif
    </div>
  </div>
</div>


<!-- /.login-box -->

    @include('footer')

</body>
</html>
