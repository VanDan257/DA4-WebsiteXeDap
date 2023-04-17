@extends('admin.layout.layout')

@section('content')
<section class="content-header">
    <div style="margin-top: 24px">
      <a href="{{ route('createsp') }}" class="btn btn-success">Thêm mới ảnh sản phẩm</a>
    </div>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>DANH SÁCH ẢNH SẢN PHẨM</h1>
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
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            {{-- <th>TT</th> --}}
                            <th>
                                Hình ảnh
                            </th>
                            <th>
                                Tiêu đề
                            </th>
                            <th>
                                Đặt mặc định
                            </th>
                            <th>
                                Vị trí
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imageproducts as $imageproduct)
                            <tr>
                                {{-- <td>{{$index+1}}</td> --}}
                                <td>
                                        <img src="{{$imageproduct->attributes->imagePath}}" style="width: 150px;" />
                                    </a>
                                </td>
                                <td>
                                    {{$imageproduct->attributes->caption}}
                                </td>
                                <td>
                                    {{$imageproduct->attributes->isDefault}}
                                </td>
                                <td>
                                    {{$imageproduct->attributes->sortOrder}}
                                </td>
                                <td>
                                    <a href="/admin/product/editimage.html?ImgID={{ $imageproduct->attributes->imgID }}"><i class="text-warning fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" ng-click="deleteImage(image.imgID)"><i class="text-danger fa-solid fa-trash"></i></a>
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