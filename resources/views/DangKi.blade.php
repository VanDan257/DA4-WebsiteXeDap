@extends('layout.layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/css/login.css">

@section('content')
       <main ontouchstart class="with-hover" style="display:flex; margin: 20px auto">
        <section>
            <p style="margin-left: 12px;">Bạn đã có tài khoản rồi? <a href="{{ route('dangnhap') }}" id="link-login">Đăng nhập</a></p>
            <h1>
                <a id="link-signup" class="active">Đăng kí</a>
                {{-- <a href="{{ route('dangnhap') }}" id="link-login">Log In</a> --}}
            </h1>
            <form id="form-signup" class="active" method="POST" action="{{ route('dangkipost') }}" name="register">
                @csrf
                <div>
                    <fieldset>
                        @error('CusName')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                        <div>
                            <label for="name">Name</label>
                            <input id="name" name="CusName" type="text" placeholder="Marcia Polo"/>
                        </div>
                    </fieldset>
                    <fieldset>
                        @error('Phone')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                        <div>
                            <label for="phone">Phone</label>
                            <input id="phone" name="Phone" type="Phone" placeholder="0123-123-123"/>
                        </div>
                    </fieldset>
                    <fieldset>
                        @error('Email')
                            <div  style="color: red">{{ $message }}</div>
                        @enderror
                        <div>
                            <label for="email">Email</label>
                            <input id="email" name="Email" type="Email" placeholder="marcia@polo.com"/>
                        </div>
                    </fieldset>
                    <fieldset>
                        @error('Password')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                        <div>
                            <label for="password">Password</label>
                            <input id="password" name="Password" type="Password" placeholder="••••••••"/>
                        </div>
                    </fieldset>
                </div>

                @error('msg')
                    <h5 class="w-100" style="color: red; margin: 0; padding: 0; text-align: center;">{{ $message }}</h5>
                @enderror
    
                <ul>
                    <li>
                        <button class="fb">Connect with Facebook</button>
                    </li>
                    <li>
                        <button class="tw">Connect with Twitter</button>
                    </li>
                </ul>
                
                <input type="submit" value="Sign Up"/>
            </form>

        </section>
    </main>

    <script src="/Assets/js/jquery-3.6.1.min.js"></script>
    <script>
        $("main").addClass("pre-enter").removeClass("with-hover");
        setTimeout(function(){
            $("main").addClass("on-enter");
        }, 500);
        setTimeout(function(){
            $("main").removeClass("pre-enter on-enter");
            setTimeout(function(){
                $("main").addClass("with-hover");
            }, 50);
        }, 3000);
    </script>

       
@endsection
