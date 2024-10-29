@extends('home')
@section('content')
<div class="container">
    <form action="{{ route('thietbi.add') }}" method="post" class="col-6" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label  class="form-label">Tên thiết bị</label>
          <input type="text" name="tenTB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label  class="form-label">Loại Thiết bị</label>
          <select name="loaiTB" id="" class="form-control">
            <option selected>--Chọn loại--</option>
            @foreach ($loai as $loai)
            {{-- <option value="">Chọn loại thiết bị</option> --}}
            <option value="{{ $loai->id }}">{{ $loai->tenTB }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" >Trạng thái</label>
          <select name="trangthai" id="" class="form-control">
            <option value="Bao tri">Bao tri</option>
            <option value="Chua bao tri">Chua bao tri</option>
          </select>
        </div>
        <div class="mb-3">
            <label  class="form-label">Hình ảnh: </label>
            <input type="file" name="file" id="">
        </div>
        @error('file')
          <p style="color: red">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-success">Thêm</button>
        <a class="btn my-2 btn-outline-danger" href="{{ route('thietbi') }}">Hủy</a>
      </form>
</div>
@endsection