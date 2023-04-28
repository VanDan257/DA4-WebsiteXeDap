@extends('layout.layout')

@section('content')

<div class="content grid">
    <div class="container-content">
        <div class="box-login">
            <div class="box-header">
                <div>
                    <h3 class="header-login active-form">ĐĂNG NHẬP</h3>
                    <p class="member">Đã là thành viên</p>
                </div>
                <div>
                    <h3 class="create-user" onclick="showSignup()">ĐĂNG KÝ</h3>
                    <p class="newuser">Đăng ký tài khoản mới</p>
                </div>
            </div>
            <form id="login">
                <div class="form-control">
                    <label for="enter-email">Email </label> 
                    <input type="email" class="email" id="enter-email" placeholder="Enter email"> 
                    <i class="fa-solid fa-check icon-success"></i>
                    <i class="fa-solid fa-exclamation icon-error"></i>
                    <small class="error-email">Error message</small>
                </div>
                <div class="form-control">
                    <label for="enter-password">Mật khẩu </label> 
                    <input type="password" class="password" id="enter-password" placeholder="Enter password"> 
                    <i class="fa-solid fa-check icon-success"></i>
                    <i class="fa-solid fa-exclamation icon-error"></i>
                    <small class="error-password">Error message</small>
                </div>
                <div class="end">
                    <button>Đăng nhập</button> 
                    <a href="#" class="miss-pasword">Quên mật khẩu?</a>
                </div>
            </form>
        </div>
        <div class="box-signup">
            <div class="box-header">
                <div>
                    <h3 class="header-login" onclick="showSignin()">ĐĂNG NHẬP</h3>
                    <p class="member">Đã là thành viên</p>
                </div>
                <div>
                    <h3 class="create-user active-form">ĐĂNG KÝ</h3>
                    <p class="newuser">Đăng ký tài khoản mới</p>
                </div>
            </div>
            <form id="sign-up">
                <div class="form-control">
                    <label for="enter-fullname">Họ và Tên</label>
                    <input type="text" id="enter-fullname" class="fname" placeholder="Enter full name">
                    <i class="fa-solid fa-check icon-success"></i>
                    <i class="fa-solid fa-exclamation icon-error"></i>
                    <small class="error-name">Error message</small>
                </div>
                <div class="container--email-phone">
                    <div class="form-control form-control-email">
                        <label for="enter-email">Email </label> 
                        <input type="email" class="email" id="enter-email-sign-up" placeholder="Enter email">
                        <i class="fa-solid fa-check icon-success"></i>
                        <i class="fa-solid fa-exclamation icon-error"></i>
                        <small class="error-email2">Error message</small>
                    </div>
                    <div class="form-control form-control-phone">
                        <label for="enter-email">Số điện thoại </label> 
                        <input type="text" class="phone" id="enter-email-sign-up" placeholder="Enter phone number"> 
                        <i class="fa-solid fa-check icon-success"></i>
                        <i class="fa-solid fa-exclamation icon-error"></i>
                        <small class="error-email2">Error message</small>
                    </div>
                </div>
                
                <div class="form-control">
                    <label for="enter-password">Mật khẩu </label> 
                    <input type="password" class="password" id="enter-password-sign-up" placeholder="Enter password"> 
                    <i class="fa-solid fa-check icon-success"></i>
                    <i class="fa-solid fa-exclamation icon-error"></i> <small class="error-password2">Error message</small>
                </div>
                <div class="form-control">
                    <label for="enter-password">Nhập lại mật khẩu </label> 
                    <input type="password" class="password-again" id="enter-password-again" placeholder="Confirm password"> 
                    <i class="fa-solid fa-check icon-success"></i>
                    <i class="fa-solid fa-exclamation icon-error"></i> <small class="error-pasword-again">Error message</small>
                </div>
                <button>Đăng ký</button>
            </form>
        </div>
    </div>
</div>

@endsection
