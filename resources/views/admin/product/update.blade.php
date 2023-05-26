@extends('admin.layout.layout')
@section('css')
<style>
  :root {
    --gray: #3e4146;
    --blue: #689bf6;
    --yellow: #ffd84c;
    --orange: #f66867;
    --purple: #8e6ac1;
    --white: #ffffff;
    --black: #000000;
  }
  
  .pop-up {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.9);
    overflow-y: auto; 
    box-shadow: 0px 6px 30px rgba(0,0,0,0.4);
    visibility: hidden;
    opacity: 0;
    transition: all .3s;
    z-index: 10;
    background-color: var(--white);
    width: 700px;
  }
  
  .content {
    overflow: hidden;
    text-align: center;
    position: relative;
  }
  
  .content .container {
    padding: 100px 20px 10px;
  }
  
  .close {
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 1.1rem;
    letter-spacing: 0.05rem;
    color: var(--gray);
    transition : all .4s;
  }
  
  .close:hover{
    cursor: pointer;
    color: var(--orange);
  }
  
  .open {
    visibility: visible;
    opacity: 1;
    transform: translate(-50%, -75%) scale(1);
    
  }
</style>

@endsection

@section('NamePage')
    Xe đạp
@endsection

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
                              <option value="{{ $product->CateID }}" name="CateID" selected>{{ $product->CateName }}</option>
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
                            <label for="enteramount">Số lượng</label>
                            @error('Amount') <i class="fa-fas-error"></i> @enderror
                            <input type="text" value="{{ $product->Amount }}" id="Amount" class="form-control" name="Amount">
                            @error('Amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          {{-- <div class="form-group" style="margin-left: 12px;">
                            <a href="#" id="addAtribute" class="btn btn-info"><span>Sửa giá sản phẩm</span></a>
                          </div>
                          <div class="form-group" style="margin-left: 12px;">
                            <a href="#" id="discount" class="btn btn-info"><span>Thêm giá khuyến mãi</span></a>
                          </div> --}}
                          <div class="form-group">
                            <label for="entertitle">Giá</label>
                            <input type="text" value="{{ $product->Price }}" id="Price" value="0" class="form-control" name="Price">
                          </div>
                          <div class="form-group">
                            <label for="entertitle">Giá khuyến mãi</label>
                            <input type="text" value="{{ $product->PromotionPrice }}" id="Price" value="0" class="form-control" name="PromotionPrice">
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
                              <a href="{{ route('deletettsp', $tskt->id) }}" class="modal-footer cursor-pointer mt-2 text-warning">Xoá thuộc tính này</a>
                            </div>
                          @endforeach
                          <div class="card-body">
                        
                            <div id="inputContainer">
                            </div>
                            <div class="form-group" style="margin-left: 12px;">
                              <button type="button" class="btn btn-info" onclick="addInput()">Thêm thuộc tính sản phẩm</button>
                            </div>
                          </div>
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
                                        <input type="hidden" name="id" value="{{ $imageproduct->id }}">
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

      {{-- <div class="pop-up" id="pop-up_price">
        <div class="content">
          <div class="container">
            <div class="dots">
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
            </div>
            
            <span class="close">close</span>
            
            <div class="title">
                <h1>Sửa giá sản phẩm</h1>
            </div>
            <div class="subscribe">
            
              <form method="POST" action="{{ route('editprice', $product->id) }}">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-4" for="tentt">Giá</label>
                    <div class="col-md-12">
                        <input id="tentt" name="Price" class="form-control" type="text" />
                    </div>
                    <label class="control-label col-md-4" for="giatritt">Ngày kết thúc</label>
                    <div class="col-md-12">
                        <input type="date" name="DatePrice" id="giatritt" class="form-control" >

                    </div>
                </div>
                <button class="btn btn-success" ng-click="addSpecification()">Sửa</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="pop-up" id="pop-up_discount">
        <div class="content">
          <div class="container">
            <div class="dots">
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
            </div>
            
            <span class="close">close</span>
            
            <div class="title">
                <h1>Thêm giá khuyến mãi</h1>
            </div>
            <div class="subscribe">
            
              <form method="POST" action="{{ route('editdiscount', $product->id) }}">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-4" for="tentt">Giá khuyến mãi</label>
                    <div class="col-md-12">
                        <input id="tentt" name="PriceDiscount" class="form-control" type="text" />
                    </div>
                    <label class="control-label col-md-4" for="giatritt">Ngày kết thúc</label>
                    <div class="col-md-12">
                        <input type="date" name="DateDiscount" id="giatritt" class="form-control" >

                    </div>
                </div>
                <button class="btn btn-success">Thêm</button>
              </form>
            </div>
          </div>
        </div>
      </div> --}}
@endsection

@section('js')
  <script>

    
  $('#addAtribute').click(function(){
    $('#pop-up_price').addClass('open');
  });

  $('.pop-up .close').click(function(){
    $('.pop-up').removeClass('open');
  }); 

  $('#discount').click(function(){
    $('#pop-up_discount').addClass('open');
  });

  $('.pop-up .close').click(function(){
    $('.pop-up').removeClass('open');
  });


    // Lấy tất cả các button trong tài liệu
    var buttons = document.querySelectorAll('.btnXoaThuocTinh');

    console.log(buttons);
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
          console.log(formGroup);
          if (formGroup !== null) {
            formGroup.remove();
          }
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
  </script>
  <script>
    $(document).ready(function(){
      $(document).on('submit', '#FormDeleteImg', function(e){
        e.preventDefault();

        $.ajax({
          url: $(this).attr('action'),
            method: 'DELETE',
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

  {{-- <script src="{{ asset('/ckeditor/ckeditor/ckeditor.js') }}"></script>
  <script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
  </script> --}}

  <script src="/Assets/ckeditor/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('Description');
  </script>
@endsection