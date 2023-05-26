@extends('admin.layout.layout')

@section('NamePage')
    Xe đạp
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>THÊM MỚI SẢN PHẨM</h1>
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
                {{-- <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div> --}}
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('storesp') }}" method="POST">
                    @csrf
                    @error('msg')
                      <div class="alert alert-danger text-center text-white">
                        {{ $message }}
                      </div>
                    @enderror
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
                            <label for="entertitle">Tiêu đề</label>@error('Title') <i class="fa-fas-error"></i> @enderror
                            <input type="text" id="Title" class="form-control" name="Title">
                            @error('Title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="inputfile">Image</label>
                            <input type="file" id="inputfile" name="Image" id="Image" class="form-control">
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="entertitle">Giá</label>
                            <input type="text" id="Price" value="0" class="form-control" name="Price">
                            @error('Price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="entertitle">Giá khuyến mại</label>
                            <input type="text" id="Price" value="0" class="form-control" name="PromotionPrice">
                          </div>
                          <div class="form-group">
                            <label for="enteramount">Số lượng</label>
                            @error('Amount') <i class="fa-fas-error"></i> @enderror
                            <input type="text" id="Amount" class="form-control" name="Amount">
                            @error('Amount')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group px-sm-5">
                        <label for="enterdes">Mô tả</label>
                        <textarea type="text" id="enterdes" class="form-control" id="Description" name="Description"></textarea>
                      </div>
                      <div class="card-body">
                        
                        <div id="inputContainer">
                        </div>
                        <div class="form-group" style="margin-left: 12px;">
                          <button type="button" class="btn btn-info" onclick="addInput()">Thêm thuộc tính sản phẩm</button>
                        </div>
                      </div>

                      {{-- <div class="form-group" style="margin-left: 12px;">
                        <a href="#" type="button" id="addAtribute" class="btn btn-info"><span>Thêm thuộc tính sản phẩm</span></a>
                      </div>
                        
                      <div class="pop-up">
                          <div class="content">
                            <div class="container">
                              <div class="dots">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                              </div>
                              
                              <span class="close">close</span>
                              
                              <div class="title">
                                  <h1>Thêm thuộc tính sản phẩm</h1>
                              </div>
                              <div class="subscribe">
                              
                                <form>
                                  <div class="form-group">
                                      <label class="control-label col-md-4" for="tentt">Tên thuộc tính</label>
                                      <div class="col-md-12">
                                          <input name="SpeName" id="tentt" class="form-control" type="text" />
                                      </div>
                                      <label class="control-label col-md-4" for="giatritt">Giá trị thuộc tính</label>
                                      <div class="col-md-12">
                                          <input type="text" id="giatritt"name="Description" class="form-control" >
                                      </div>
                                  </div>
                                  <button class="btn btn-success" ng-click="addSpecification()">Thêm</button>
                                </form>
                              </div>
                            </div>
                          </div>
                      </div> --}}

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

@section('js')
  <script>
    
    // Duyệt qua tất cả các button
    for (var i = 0; i < buttons.length; i++) {
      var button = buttons[i];

      // Kiểm tra nếu button nằm trong một thẻ có class "form-group"
      if (button.closest('.form-group')) {

        // Thêm sự kiện click vào button
        button.addEventListener('click', function(event) {
          // Ngăn chặn hành vi mặc định của button (chuyển trang hoặc submit form)
          event.preventDefault();

          // Lấy phần tử cha của button có class "form-group" và xoá nó
          var formGroup = button.closest('.form-group');
          formGroup.remove();
        });
      }
    }

    function addInput() {
      // Tạo thẻ input mới
      var spediv = document.createElement('div');
      var speLabel = document.createElement('label');
      var speInput = document.createElement('input');
      spediv.classList.add('form-group');
      speLabel.innerText = 'Tên thuộc tính'
      speInput.classList.add('form-control');
      speInput.name = 'SpeName[]';
      spediv.appendChild(speLabel);
      spediv.appendChild(speInput);

      var desdiv = document.createElement('div');
      var desLabel = document.createElement('label');
      var desInput = document.createElement('input');
      desdiv.classList.add('form-group');
      desLabel.innerText = 'Mô tả'
      desInput.classList.add('form-control');
      desInput.name = 'SpeDescription[]';
      desdiv.appendChild(desLabel);
      desdiv.appendChild(desInput);

      // Tìm thẻ div chứa các input hiện tại
      var inputContainer = document.getElementById('inputContainer');

      // Thêm input mới vào div
      inputContainer.appendChild(spediv);
      inputContainer.appendChild(desdiv);
      inputContainer.appendChild(button);
    }

    var buttons = document.querySelectorAll('.btnXoaThuocTinh');

    $('#addAtribute').click(function(){
        $('.pop-up').addClass('open');
    });

    $('.pop-up .close').click(function(){
        $('.pop-up').removeClass('open');
    });
  </script>
  <script src="/Assets/ckeditor/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('Description');
  </script>
@endsection
