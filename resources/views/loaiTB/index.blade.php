@extends('home')
@section('content') <!-- chưa nd được tham chieeys đến -->
<div class="container">
  <div class="row">
      <div class="col-2">
          <a class="btn btn-success" href="{{ route('loaiTB.them') }}">Thêm loại thiết bị</a>
      </div>
  </div>
  <table class="table table-striped">
        <thead>
          <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">STT</th>
            <th scope="col">Type</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($loai as $loai)
            <tr>
                {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                <td>{{ $loop->iteration }}</td>
                <td>{{ $loai->tenTB }}</td>
                <td class="d-flex">
                  <a class="btn btn-success" href="{{ route('loaiTB.Edit', $loai->id) }}">Sửa</a>
                  <form action="{{ route('loaiTB.delete', $loai->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">Xóa</button>
                  </form>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>


      @if(session('seccess')){
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      }
      @endif
  {{-- @if(session('success'))
  <script>
    alert(' {{ session('success') }}');
  </script>
  @endif --}}

  @if(session('error'))
  <script>
    alert(' {{ session('error') }}');
  </script>
  @endif
</div>
  @if($loai->count()<1)
      <p>Không tìm thấy kết quả nào.</p>
  @endif

@endsection