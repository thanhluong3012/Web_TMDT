@extends('home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-2">
            <a class="btn btn-success" href="{{ route('ThietBi.add') }}">Thêm thiết bị</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
          <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">STT</th>
            <th scope="col">Tên thiết bị</th>
            <th scope="col">loại thiết bị</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Hình ảnh</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($thietbi as $thietbi)
            <tr>
                <td class="col_TB">{{ $loop->iteration }}</td>
                <td class="col_TB">{{ $thietbi->tenTB }}</td>
                <td class="col_TB">{{ $thietbi->loaiTB->tenTB }}</td>
                <td class="col_TB">{{ $thietbi->trangthai }}</td>
                <td class="col_TB"><img class="device_img" src="img/{{ $thietbi->hinh }}" alt="" width="50px" height="50px"></td>
                
                <td>
                  <div class="d-flex">
                    <a class="btn btn-success " href="{{ route('Thietbi.edit' ,$thietbi->id) }}" style="height: 38px">Sửa</a>
                    <form action="{{ route('thietbi.delete', $thietbi->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="confirmDelete(event,'{{ $thietbi->tenTB }}')">Xóa</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>
{{-- Thông báo thêm thành công --}}
{{-- @if(session('success'))
<script>
  alert(' {{ session('success') }}');
</script>
@endif --}}

{{-- Thông báo xóa thành công --}}
@if(session('success'))
<script>
  alert(' {{ session('success') }}');
</script>
@endif



{{-- Thông báo xóa không thành công --}}
@if(session('error'))
<script>
  alert(' {{ session('error') }}');
</script>


{{-- <script>
  function confirmDelete() {
      return confirm('Bạn có chắc chắn muốn xóa thiết bị này không?');
  }
</script> --}}
@endif
@endsection