@extends('admin.layout.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>THÊM MỚI SẢN PHẨM</h1>
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
                          <div class="form-group">
                            <a href="{{ route('indeximg', $product->id) }}" class="btn btn-dribbble">
                              Danh sách ảnh
                            </a>
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
                          <div class="form-group">
                            <label for="enterdes">Mô tả</label>
                            <input type="text" value="{{ $product->Description }}" id="enterdes" class="form-control" id="Description" name="Desscription">
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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