@extends('layout.layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="/css/popup.css">

@section('content')
{{-- <div class="container">
    
    <div class="row">
        <div class="navbar navbar-collapse">
            <div class="navbar-nav">
                <ul>
                    <li><a href="" class="nav-link border">Thông tin tài khoản</a></li>
                    <li><a href="" class="nav-link border">Quản lý đơn hàng</a></li>
                    <li><a href="" class="nav-link border">Quản lý địa chỉ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<div class="container" style="margin: 20px auto;">
    @include('layout.navbarkhachhang')
    <div class="col-sm-9">
        <main class="with-hover" style="height: 550px;width: 100%;display:flex;">
            <section style="margin-top: 20px;">
                <h2 class="pl-3 text-primary">THÔNG TIN CÁ NHÂN</h2>
                <form id="form-signup" class="active" method="POST" action="{{ route('updatekhachhang') }}">
                    @csrf
                    <div>
                        <fieldset>
                            @error('CusName')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            <div>
                                <label style="width: 120; display: flex; justify-content: center;" for="name">Họ tên</label>
                                <input id="name" name="CusName" value="{{ $customer->CusName }}" type="text" placeholder="Marcia Polo"/>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('Phone')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            <div>
                                <label style="width: 120; display: flex; justify-content: center;" for="phone">Phone</label>
                                <input id="phone" name="Phone" type="Phone" value="{{ $customer->Phone }}"  placeholder="0123-123-123"/>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('Address')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            <div>
                                <label style="width: 120; display: flex; justify-content: center;" for="Address">Địa chỉ</label>
                                <input id="Address" name="Address" type="Address" value="{{ $customer->Address }}"  placeholder="Số 250 - Minh Khai - Hai Bà Trưng - Hà Nội"/>
                            </div>
                        </fieldset>
                        <fieldset>
                            @error('Email')
                                <div  style="color: red">{{ $message }}</div>
                            @enderror
                            <div>
                                <label style="width: 120; display: flex; justify-content: center;" for="email">Email</label>
                                <input id="email" name="Email" type="Email" value="{{ $customer->Email }}"  placeholder="marcia@polo.com"/>
                            </div>
                        </fieldset>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-primary text-white ml-3" style="width:170px; height: 50px">Cập nhật thông tin</button>
                        <div class="form-group" style="margin-left: 12px;">
                            <a href="#" id="addAtribute" class="btn btn-info text-black ml-3 d-flex align-items-center" style="width:130px; height: 50px">Đổi mật khẩu</a>
                        </div>
                    </div>
        
                </form>
                    
                
            </section>
        </main>
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
                        <h1>Cập nhật mật khẩu</h1>
                    </div>
                    <div class="subscribe">
                    
                    <form id="updatePassword" method="POST" action="{{ route('capnhatmatkhau') }}">
                        @csrf
                        <div class="form-group">
                            @if(Session::has('msg'))
                                <div class="alert alert-success">{{ Session::get('msg') }}</div>
                            @endif
                            <label class="control-label col-md-4" for="matkhaucu">Mật khẩu cũ</label>
                            <div class="col-md-12">
                                <input id="matkhaucu" name="matkhaucu" class="form-control" type="text" />
                            </div>
                            <label class="control-label col-md-4" for="matkhaumoi">Mật khẩu mới</label>
                            <div class="col-md-12">
                                <input type="text" name="matkhaumoi" id="matkhaumoi"class="form-control" >
                            </div>
                        </div>
                        <button class="btn btn-success">Cập nhật</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    $('#addAtribute').click(function(){
        $('.pop-up').addClass('open');
    });

    $('.pop-up .close').click(function(){
        $('.pop-up').removeClass('open');
    });

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    // $(document).ready(function() {
    //     $('#updatePassword').submit(function(e) {
    //         e.preventDefault();
            
    //         var formData = $(this).serialize();

    //         // console.log(formData);
            
    //         $.ajax({
    //             url: {{ route('capnhatmatkhau') }},
    //             type: 'POST',
    //             data: formData,
    //             success: function(response) {
    //                 // Xử lý kết quả trả về ở đây
    //                 console.log(response);
    //             }
    //         });
    //     });
    // });
</script>
@endsection