<div class="navbar">
    <div class="container-navbar grid">
        <div class="navbar-vertical">
            <input type="checkbox" id="displayCategory">
            <label for="displayCategory">
                <div class="category">
                    <i class="category-icon fa-solid fa-bars"></i>
                    <h4 class="category-text">DANH MỤC SẢN PHẨM</h4>
                </div>
            </label>
            
            <ul class="category-list">
                @foreach ($categories as $category)
                    
                    <li class="menu-item-dad">
                        <a href="#xe-dap" class="category-item-link">
                            <img src="/Assets/imgs/category1.png" class="category-item-icon" alt="">
                            <p class="category-item-text">{{ $category->CateName }}</p>
                            <i class="drop-right fa-solid fa-angle-right"></i>
                        </a>
                        {{-- <ul class="menu-item-child">
                            <li class="list-menu-item"><a href=""> XE ĐẠP ĐUA (ROAD)</a></li>
                            <li class="list-menu-item"><a href=""> XE ĐẠP LEO NÚI(MTB)</a></li>
                            <li class="list-menu-item"><a href=""> XE ĐẠP ĐƯỜNG DÀI(TOURING)</a></li>
                            <li class="list-menu-item"><a href=""> XE ĐẠP THÀNH PHỐ (CITY)</a></li>
                            <li class="list-menu-item"><a href=""> XE ĐẠP XẾP / GẤP(FOLDING)</a></li>
                            <li class="list-menu-item"><a href=""> XE ĐẠP TRẺ EM</a></li>
                            <li class="list-menu-item"><a href=""> XE ĐẠP KHÔNG THẮNG (FIXED GEAR)</a></li>
                            <li class="list-menu-item"><a href=""> XE ĐẠP ĐIỆN</a></li>
                        </ul> --}}
                    </li>   
                @endforeach

                {{-- <li class="menu-item-dad">
                    <a href="#phu-tung" class="category-item-link">
                        <img src="/Assets/imgs/category2.png" class="category-item-icon" alt="">
                        <p class="category-item-text">PHỤ TÙNG</p>
                        <i class="drop-right fa-solid fa-angle-right"></i>
                    </a>
                    <ul class="menu-item-child">
                        <li class="list-menu-item"><a href="">ROAD</a></li>
                        <li class="list-menu-item"><a href="">MTB</a></li>
                        <li class="list-menu-item"><a href="">FIXED GEAR</a></li>
                        <li class="list-menu-item"><a href="">CHÉN CỔ</a></li>
                        <li class="list-menu-item"><a href="">PHUỘC</a></li>
                        <li class="list-menu-item"><a href="">ĐỒ NGHỀ, DỤNG CỤ</a></li>
                        <li class="list-menu-item"><a href="">BAGA, CHỐNG, GIÁ DỰNG</a></li>
                    </ul>
                </li>
                <li class="menu-item-dad">
                    <a href="#phu-kien" class="category-item-link">
                        <img src="/Assets/imgs/category3.png" class="category-item-icon" alt="">
                        <p class="category-item-text">PHỤ KIỆN</p>
                        <i class="drop-right fa-solid fa-angle-right"></i>
                    </a>
                    <ul class="menu-item-child">
                        <li class="list-menu-item"><a href="">PHỤC KIỆN ĐIỆN TỬ</a></li>
                        <li class="list-menu-item"><a href="">GHẾ NGỒI TRẺ EM</a></li>
                        <li class="list-menu-item"><a href="">TRANG PHỤC, BẢO HỘ</a></li>
                    </ul>
                </li>
                <li class="menu-item-dad">
                    <a href="#bo-truyen-dong" class="category-item-link">
                        <img src="/Assets/imgs/category4.png" class="category-item-icon" alt="">
                        <p class="category-item-text">BỘ TRUYỀN ĐỘNG</p>
                        <i class="drop-right fa-solid fa-angle-right"></i>
                    </a>
                    <ul class="menu-item-child">
                        <li class="list-menu-item"><a href="">GROUPSET</a></li>
                        <li class="list-menu-item"><a href="">TAY ĐỀ - TAY LẮC</a></li>
                        <li class="list-menu-item"><a href="">CÙI ĐỀ TRƯỚC(SANG DĨA)</a></li>
                        <li class="list-menu-item"><a href="">CÙI ĐỀ SAU(SANG LÍP)</a></li>
                        <li class="list-menu-item"><a href="">GIÒ ĐĨA</a></li>
                        <li class="list-menu-item"><a href="">LÍP</a></li>
                        <li class="list-menu-item"><a href="">SÊN</a></li>
                        <li class="list-menu-item"><a href="">TRỤC GIỮA</a></li>
                        <li class="list-menu-item"><a href="">BÁNH BỘ</a></li>
                        <li class="list-menu-item"><a href="">ĐÙM - CĂM - NIỀNG</a></li>
                        <li class="list-menu-item"><a href="">VỎ - RUỘT</a></li>
                        <li class="list-menu-item"><a href="">THẮNG</a></li>
                        <li class="list-menu-item"><a href="">VÈ</a></li>
                    </ul>
                </li>
                <li class="menu-item-dad">
                    <a href="#khung-suon" class="category-item-link">
                        <img src="/Assets/imgs/category5.png" class="category-item-icon" alt="">
                        <p class="category-item-text">KHUNG SƯỜN</p>
                        <i class="drop-right fa-solid fa-angle-right"></i>
                    </a>
                    <ul class="menu-item-child">
                        <li class="list-menu-item"><a href="">KHUNG ROAD</a></li>
                        <li class="list-menu-item"><a href="">KHUNG MTB</a></li>
                        <li class="list-menu-item"><a href="">KHUNG FIXED GEAR</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="" class="category-item-link">
                        <img src="/Assets/imgs/category6.png" class="category-item-icon" alt="">
                        <p class="category-item-text">TUỲ CHỌN CẤU HÌNH</p>
                        <i class="drop-right fa-solid fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="menu-header">
            <ul class="list-menu">
                <li class="menu-item-dad"><a href="{{ route('home') }}"> TRANG CHỦ </a></li>
                <li class="menu-item-dad"><a href="{{ route('danhmucsanpham') }}"> SẢN PHẨM</a>
                </li>
                <li class="menu-item-dad"><a href="#"> GIỚI THIỆU</a></li>
                <li class="menu-item-dad"><a href="{{ route('tintuc') }}"> TIN TỨC</a></li>
                <li class="menu-item-dad"><a href="#"> LIÊN HỆ</a></li>
                <li class="menu-item-dad"><a href="#"> FANPAGE</a></li>
            </ul>
            <div class="user-main-menu user-top">
                <div class="drop-down drop-down-main-menu">
                    <a href="{{ route('dangnhap') }}">
                        <span class="user-item">Tài khoản</span>
                        <i class="fa-solid fa-angle-down down-user"></i>
                    </a>
                        <!-- <ul class="user-link">
                            <li class="user-link-login"><a href="">Đăng nhập</a></li>
                            <li class="user-link-login"><a href="">Đăng ký</a></li>
                        </ul> -->
                    <span class="border-separate"></span>
                </div>
                <div class="support-link">
                    <a href="#" class="user-item">Dịch vụ</a>
                    <span class="border-separate"></span>
                    <a href="#" class="user-item">Hỗ trợ</a>
                    <span class="border-separate"></span>
                </div>
                <div class="top-cart">
                    <a href="GioHang.html">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>