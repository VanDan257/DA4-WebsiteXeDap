@extends('admin.layout.layout')

@section('NamePage')
    Xe đạp
@endsection

@section('content')    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm ảnh sản phẩm</h1>
        </div>
    </div>

    <!-- Begin Page Content -->
    <form action="{{ route('storeimg') }}" method="POST" enctype="multipart/form-data">
        <div class="form-horizontal">
            <hr />

            <input type="hidden" name="ProID" value="{{  $imageproducts[0]->ProID }}">
            
            <div class="form-group">
                <label class="control-label col-md-2">Tiêu đề</label>
                <div class="col-md-10">
                    <input type="text" name="Caption" class="form-control" />
                </div>
            </div>
            

            <div class="form-group">
                <label for="inputfile">Hình ảnh</label>
                <input type="file" id="inputfile" name="Image" id="Image" class="form-control">
              </div>

            <div class="form-group">
                <label class="control-label col-md-2">Vị trí</label>
                <div class="col-md-10">
                    <input type="text" name="SortOrder" class="form-control" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">Đặt mặc định</label>
                <div class="col-md-10">
                    <select name="IsDefault">
                        <option value="1">true</option>
                        <option value="0" selected> false</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button class="btn fa fa-save" type="submit">
                        Save
                    </button>
                    <a href="{{ route('indeximg', $imageproducts[0]->id) }}"><i class="btn fa fa-close"></i></a>
                </div>
            </div>
            @csrf
        </div>
    </form>
    <!-- /.container-fluid -->
@endsection