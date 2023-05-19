@extends('admin.layout.layout')

@section('NamePage')
    Nhân viên
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>THÊM MỚI NHÂN VIÊN</h1>
            </div>
            {{-- <div class="col-sm-6">
              <h1>DANH SÁCH SINH VIÊN</h1>
            </div> --}}
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
                <form role="form" action="{{ route('storedm') }}" method="POST">
                    @csrf
                    <div class="row">
  
                      <div class="card-body">
                        
                        <div class="form-group">
                          <label for="entertitle">Tên nhân viên</label>
                          <input type="text" id="username" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="email">Password</label>
                          <input type="email" id="password" name="password" class="form-control">
                        </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
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

