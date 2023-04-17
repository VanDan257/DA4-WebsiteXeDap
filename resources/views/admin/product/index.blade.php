@extends('admin.layout.layout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div style="margin-top: 24px; margin-left: 24px">
    <a href="{{ route('createsp') }}" class="btn btn-success">Thêm mới sản phẩm</a>
  </div>
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1>DANH SÁCH SẢN PHẨM</h1>
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Hình ảnh</th>
                  <th>Tiêu đề</th>
                  <th>Danh mục</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                  
                  <tr>
                    <td><a href="{{ route('indeximg', $product->id) }}"><img style="width:150px" src="/FileUpLoad/images/{{ $product->Image }}" alt=""></a></td>
                    <td>{{ $product->Title }}</td>
                    <td>{{ $product->category->CateName ?? '' }}</td>
                    <td>
                      {{-- <a href="{{ route('editsp',$product->id) }}"><i class="text-warning fa-solid fa-edit"></i></a>
                      <a href="#" onclick="removeProduct($product->id, '/admin/product/destroy')"><i class="text-danger fa-solid fa-trash"></i></a> --}}
                      <form action="{{ route('deletesp', $product->id) }}" method="post">
                        <a href="{{ route('editsp',$product->id) }}"><i class="text-warning fa-solid fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; outline: none"><i class="text-danger fa-solid fa-trash"></i></button>
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

  {{-- <script src="/Admin/js/main.js"></script> --}}
@endsection


