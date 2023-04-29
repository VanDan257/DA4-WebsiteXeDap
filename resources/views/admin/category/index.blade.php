@extends('admin.layout.layout')

@section('NamePage')
    Danh mục
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div style="margin-top: 24px; margin-left: 24px">
    <a href="{{ route('createdm') }}" class="btn btn-success">Thêm mới danh mục</a>
  </div>
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1>DANH SÁCH DANH MỤC</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              @if(Session::has('thongbao'))
                <div class="alert alert-success">{{ Session::get('thongbao') }}</div>
              @endif
              <table id="example2" class="table table-bordered table-hover" id="dataTable">
                <thead>
                <tr>
                  <th>Tên danh mục</th>
                  <th>Danh mục cha</th>
                  <th>Ngày tạo</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                  
                  <tr>
                    <td>{{ $category->CateName }}</td>
                    <td>{{ $category->CateParentID }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                      {{-- <a href="{{ route('editsp',$product->id) }}"><i class="text-warning fa-solid fa-edit"></i></a>
                      <a href="#" onclick="removeProduct($product->id, '/admin/product/destroy')"><i class="text-danger fa-solid fa-trash"></i></a> --}}
                      <form id="delete-category" action="{{ route('deletedm', $category->id) }}" method="post">
                        <a href="{{ route('editdm',$category->id) }}"><i class="text-warning fa-solid fa-edit"></i></a>
                        <a href="{{ route('showdm',$category->id) }}"><i class="fa-solid fa-circle-info"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="submit-form" style="border: none; outline: none"><i class="text-danger fa-solid fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach 
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection

@section('js')
  <!-- DataTables -->
  <script src="/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script>
    const form = document.querySelector('#delete-category');
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Ngăn chặn form được gửi đi

        // Hiển thị hộp thoại xác nhận
        if (confirm('Bạn có chắc chắn muốn xóa danh mục này không?')) {
            form.submit(); // Cho phép form được gửi đi
        }
    });
  </script>

  {{-- <script src="/Admin/js/main.js"></script> --}}
@endsection