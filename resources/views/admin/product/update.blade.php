@extends('admin.layout.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>CẬP NHẬT SẢN PHẨM {{ $product->Title }}</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('updatesp', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
  
                        <div class="card-body">
                          
                          <div class="form-group">
                            <label for="entercateid">Danh mục</label>
                            <select class="form-control" name="CateID" id="CateID">
                              <option value="" name="CateID" selected> -- Chọn danh mục --</option>
                              @foreach($categories as $category)
                                <option name="CateID" value="{{ $category->id }}" >{{ $category->CateName  }}</option>
                              @endforeach
                              {{-- {!! Form::select('categories', $categories, null, ['class' => 'form-control']) !!} --}}
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="entertitle">Tiêu đề</label>
                            <input type="text" value="{{ $product->Title }}" id="Title" class="form-control" name="Title">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="entertitle">Giá</label>
                            <input type="text" value="{{ $product->Price }}" id="Price" value="0" class="form-control" name="Price">
                          </div>
                          <div class="form-group">
                            <label for="entertitle">Giá khuyến mại</label>
                            <input type="text" value="{{ $product->PromotionPrice }}" id="PromotionPrice" value="0" class="form-control" name="PromotionPrice">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="enterdes">Mô tả</label>
                        <input type="text" value="{{ $product->Description }}" id="enterdes" class="form-control" id="Description" name="Description">
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h3>Thông Số Kỹ Thuật</h3>
                          @foreach ($specifications as $tskt)
                            <div class="form-group">
                              <label for="enterdes">{{ $tskt->SpeName }}</label>
                              <input type="hidden" value="{{ $tskt->SpeName }}" name="SpeName[]">
                              <input type="text" value="{{ $tskt->Description }}" id="enterdes" class="form-control" id="SpeDescription" name="SpeDescription[]">    
                            </div>
                          @endforeach
                        </div>
                      </div>
                      <div class="col-md-6">
                        {{-- <a href="{{ route('indeximg', $product->id) }}">Danh sách ảnh sản phẩm</a> --}}
                        <h3>Danh Sách Hình Ảnh</h3>
                        <table class="table table-bordered table-striped" id="dataTable">
                          <thead>
                              <tr>
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
                                      <td>
                                              <img src="/FileUpLoad/images/{{$imageproduct->ImagePath}}" style="width: 150px;" />
                                          </a>
                                      </td>
                                      <td>
                                          {{$imageproduct->Caption}}
                                      </td>
                                      <td>
                                          {{$imageproduct->IsDefault}}
                                      </td>
                                      <td>
                                          {{$imageproduct->SortOrder}}
                                      </td>
                                      <td>
                                        <form action="{{ route('deleteimg', $imageproduct->id) }}" id="FormDeleteImg" method="post">
                                          <a href="{{ route('editimg',$imageproduct->id) }}"><i class="text-warning fa-solid fa-edit"></i></a>
                                          <input type="hiddent" name="id" value="{{ $imageproduct->id }}">
                                          @csrf
                                          {{-- @method('DELETE') --}}
                                          <button type="submit" style="border: none; outline: none"><i class="text-danger fa-solid fa-trash"></i></button>
                                        </form>                          
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                          <div style="margin-top: 24px">
                            <a href="{{ route('createimg', $product->id) }}" class="btn btn-success">Thêm mới ảnh sản phẩm</a>
                          </div>
                        </table>
                      </div>
                      
                    </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    {{-- <form action="{{ route('updatesp', $product->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <button class="btn btn-primary">Cập nhật</button>
                    </form> --}}

                    <button class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('indexsp') }}" class="btn btn-primary">Quay lại</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-6">
          </div><!-- /.container-fluid -->
        </div>
      </section>
      <!-- /.content -->
@endsection

@section('js')
  <script>
    $(document).ready(function(){
      $(document).on('submit', '#FormDeleteImg', function(e){
        e.preventDefault();

        $.ajax({
          url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#result').html(response);
                },
                error: function(xhr) {
                    $('#result').html(xhr.responseText);
                }
        })
      })
    })
  </script>
  <script src="/Assets/ckeditor/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('Description');
  </script>
@endsection