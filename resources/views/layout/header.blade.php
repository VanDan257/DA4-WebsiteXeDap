<header id="header">
    <!-- Topbar Start -->
    <div class="header-top bg-gray-900 py-2">
        <div class="container">
            <div class="row py-2">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-light" href="">FAQs</a>
                        <span class="text-muted px-2">|</span>
                        <a class="text-light" href="">Help</a>
                        <span class="text-muted px-2">|</span>
                        <a class="text-light" href="">Support</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-light px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-light px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-light px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-light px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-light pl-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <div class="header-inner py-4 bg-gray-900">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">CYCLE</span><span class="text-light">SHOP</span></h2>
                    </a>
                </div>
                <div class="col-lg-6 col-12 text-left search-inner">
                    <form action="" class="w-100 position-relative">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for products">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary text-light">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>

                            <div class="search-history w-100 bg-light mt-2 rounded">
                                <h5 class="p-3">
                                    Search history
                                </h5>
                                <ul class="list-group">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Morbi leo risus</li>
                                    <li class="list-group-item">Porta ac consectetur ac</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                  </ul>

                                <a href="" class="btn text-center w-100 p-2 btn-show-all">All</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-12 d-flex align-items-center justify-content-lg-end justify-content-sm-between">
                    @if(Session::has('CusName'))
                        <div class="text-white">{{ Session::get('CusName') }}</div>
                        <a href="{{ route('khachhang') }}" class="btn" style="font-size: 20px">
                            <i class="fas fa-user text-primary"></i>
                        </a>
                    @else
                        <a href="{{ route('dangnhap') }}" class="btn" style="font-size: 20px">
                            <i class="fas fa-user text-primary"></i>
                        </a>
                    @endif
                    <a href="{{ route('giohang') }}" class="btn" style="font-size: 20px">
                        <i class="fas fa-shopping-cart text-primary"></i>
                        <span class="badge sum-cart text-light">{{ Cart::getTotalQuantity() ?? 0}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Navbar Start -->
    <div class="header-nav bg-gray-900">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg bg-gray-900 navbar-light py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none">
                            <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">WATCH</span>SHOP</h2>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0 w-100 d-flex justify-content-center">
                                <a href="{{ route('home') }}" class="nav-item nav-link position-relative text-uppercase mx-4 active">Home</a>
                                
                                    <div class="mx-4 hero__categories">
                                        <div class="hero__categories__all">
                                            <a href="{{ route('danhmucsanpham') }}" class="nav-item nav-link position-relative text-uppercase">
                                                <i class="fa fa-bars"></i>
                                                <span>Shop</span>
                                            </a>
                                        </div>
                                        <ul style="display: none; background-color: #393939c5; left:30%" class="dropdown-menu">
                                            @foreach ($categories as $category)
                                                <li><a class="nav-link nav-item" href="{{ route('danhmucloaisanpham', $category->id) }}">{{ $category->CateName }}</a></li>
                                            @endforeach
                                            {{-- <li><a class="nav-link nav-item" href="#">Xe đạp thành phố(MTB)</a></li>
                                            <li><a class="nav-link nav-item" href="#">Xe đạp đường dài</a></li>
                                            <li><a class="nav-link nav-item" href="#">Fresh Berries</a></li> --}}
                                        </ul>
                                    </div>
                                {{-- <a href="detail.html" class="nav-item nav-link position-relative text-uppercase  mx-4">Shop Detail</a> --}}
                                <a href="{{ route('giohang') }}" class="nav-item nav-link position-relative text-uppercase  mx-4">Shopping Cart</a>
                                <a href="{{ route('thanhtoan') }}" class="nav-item nav-link position-relative text-uppercase  mx-4">Checkout</a>
                                <a href="{{ route('tintuc') }}" class="nav-item nav-link position-relative text-uppercase  mx-4">Blog</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
</header>