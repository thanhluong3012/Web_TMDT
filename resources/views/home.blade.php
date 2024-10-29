<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    #navigation{
      position: fixed;
    }
  </style>

  @include('css');
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav id="search" class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <form action="{{ route('search') }}" class="d-flex" method="POST">
          @csrf
          <input class="form-control my-2 me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn my-2 btn-outline-success" type="submit">Search</button>
        </form>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('slidebar');

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')  <!-- tham chiếu đến file khác -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


@include('footer');



<script>
  function confirmDelete(event, tenTB) {
      event.preventDefault(); // Ngăn chặn việc submit form tự động
      const form = event.target.form; // Form hiện tại
      Swal.fire({
          title: 'Bạn có chắc chắn?',
          text: "Bạn có muốn xóa thiết bị tên "+ tenTB + " này không?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Xóa',
          cancelButtonText: 'Hủy'
      }).then((result) => {
          if (result.isConfirmed) {
              form.submit(); // Thực hiện xóa nếu người dùng chọn Xóa
          }
      })
  }
</script>
</body>
</html>
