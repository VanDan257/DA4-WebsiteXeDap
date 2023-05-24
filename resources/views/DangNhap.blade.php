@extends('layout.layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/css/login.css">

@section('content')
       <main ontouchstart class="with-hover" style="display:flex; margin: 20px auto">
        {{-- <div class="home">
            <a href="{{ route('home') }}" class="btn-home"><i class="fa-solid fa-house"></i></a>
        </div> --}}
        
        {{-- <aside>
            <div></div>
            <i class="fa-solid fa-bicycle"></i> --}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <g stroke="#fff" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M312 32c-13.3 0-24 10.7-24 24s10.7 24 24 24h25.7l34.6 64H222.9l-27.4-38C191 99.7 183.7 96 176 96H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h43.7l22.1 30.7-26.6 53.1c-10-2.5-20.5-3.8-31.2-3.8C57.3 224 0 281.3 0 352s57.3 128 128 128c65.3 0 119.1-48.9 127-112h49c8.5 0 16.3-4.5 20.7-11.8l84.8-143.5 21.7 40.1C402.4 276.3 384 312 384 352c0 70.7 57.3 128 128 128s128-57.3 128-128s-57.3-128-128-128c-13.5 0-26.5 2.1-38.7 6L375.4 48.8C369.8 38.4 359 32 347.2 32H312zM458.6 303.7l32.3 59.7c6.3 11.7 20.9 16 32.5 9.7s16-20.9 9.7-32.5l-32.3-59.7c3.6-.6 7.4-.9 11.2-.9c39.8 0 72 32.2 72 72s-32.2 72-72 72s-72-32.2-72-72c0-18.6 7-35.5 18.6-48.3zM133.2 368h65c-7.3 32.1-36 56-70.2 56c-39.8 0-72-32.2-72-72s32.2-72 72-72c1.7 0 3.4 .1 5.1 .2l-24.2 48.5c-9 18.1 4.1 39.4 24.3 39.4zm33.7-48l50.7-101.3 72.9 101.2-.1 .1H166.8zm90.6-128H365.9L317 274.8 257.4 192z"/>
            </svg> 
            <div>
                <p id="intro-signup" class="active">Đăng ký tài khoản cho website<strong>XeDapTrucTuyen</strong>.</p>
                <p id="intro-login">Chào mừng trở lại <br/><strong>XeDapTrucTuyen</strong>!</p>
            </div>
        </aside>--}}
        <section>
            <p style="margin-left: 12px;">Bạn chưa có tài khoản? <a href="{{ route('dangki') }}" id="link-signup">Đăng kí</a></p>
            <h1>
                <a id="link-login" class="active">Đăng nhập</a>
            </h1>
            <form id="form-login" class="active" method="POST" action="{{ route('dangnhappost') }}" name="login">
                @csrf
                <div>
                    <fieldset>
                        @error('Email')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                        <div>
                            <label for="email">Email</label>
                            <input id="email" type="email" name="Email" class="Email" placeholder="marcia@polo.com"/>
                        </div>
                    </fieldset>
                    <fieldset>
                        @error('Password')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                        <div>
                            <label for="password">Password</label>
                            <input id="password" type="password" name="Password" class="Password" placeholder="••••••••"/>
                        </div>
                    </fieldset>
                </div>

                @error('msg')
                    <h5 class="w-100" style="color: red; margin: 0; padding: 0; text-align: center;">Đăng nhập không thành công</h5>
                @enderror
    
                <ul>
                    <li>
                        <button class="fb">Connect with Facebook</button>
                    </li>
                    <li>
                        <button class="tw">Connect with Twitter</button>
                    </li>
                </ul>
                
                <input type="submit"  value="Log In"/>
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
