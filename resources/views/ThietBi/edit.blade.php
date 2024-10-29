@extends('home')
@section('content')
<div class="container">
    <form action="{{ route('thietbi.update', $thietbi->id) }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <label for="tenTB" >Tên Thiết Bị</label>
        <div  class="d-flex">
          <input class="form-control my-2 me-2" type="text" id="tenTB" name="tenTB" value="{{ $thietbi->tenTB }}">
        </div>
    
        <label for="tenTB" >Loại thiết bị</label>
        <div  class="d-flex">
            <select name="loaiTB" id="" class="form-control" >
                @foreach ($loai as $loai)
                <option {{ ($thietbi->id_loaiTB == $loai->id) ? 'selected' :'' }} value="{{ $loai->id }}">{{ $loai->tenTB }}</option>
                @endforeach
            </select>
        </div>
    
        <label for="">Trạng thái</label>
        <div class="mb-3">
            <select name="trangthai" id="" class="form-control">
            @if($thietbi->trangthai == 'Bao tri' )
              <option selected value="{{ $thietbi->trangthai }}">{{ $thietbi->trangthai }}</option>
              <option value="Chua bao tri">Chua bao tri</option>
            @else
                <option  value="Bao tri">Bao tri</option>
                <option selected value="{{ $thietbi->trangthai }}">{{ $thietbi->trangthai }}</option>
            @endif
            </select>
        </div>


        <label for="">Hình ảnh</label>
        <div>
            <img  src="{{ url('img/'.$thietbi->hinh)  }}" alt="" width="200px" height="200px">
            <input type="file" name="file" id="">
        </div>

        <button class="btn my-2 btn-outline-success" type="submit">Lưu</button>
        <a class="btn my-2 btn-outline-danger" href="{{ route('thietbi') }}">Hủy</a>
    </form>
</div>
@endsection