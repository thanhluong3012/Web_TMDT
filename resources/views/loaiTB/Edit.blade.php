@extends('home')
@section('content')
<div class="container">
  <form action="{{ route('loaiTB.update', $loai->id) }}"  method="POST">
    @csrf
    @method('PUT') 
    <label for="tenTB" >Tên Thiết Bị:</label>
    <div  class="d-flex">
      <input class="form-control my-2 me-2" type="text" id="tenTB" name="tenTB" value="{{ $loai->tenTB }}">
      <button class="btn my-2 btn-outline-success" type="submit">Lưu</button>
    </div>
</form>
    
</div>
@endsection