@extends('home')
@section('content') <!-- chưa nd được tham chieeys đến -->
<div class="container">
    <form action="{{ route('loaiTB.add') }}" method="post">
        @csrf
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Loại TB</label>
        <input name="tenTB" type="text" class="form-control" id="exampleFormControlInput1" >
      </div>
      <button class="btn btn-success" type="submit">Thêm</button>
    </form>
</div>
@endsection