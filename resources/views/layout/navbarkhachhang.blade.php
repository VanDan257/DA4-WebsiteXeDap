<div class="row">
    <div class="col-3 position-relative">
      <div class="sidebar-nav mb-5">
          <div class="navbar navbar-default" style="padding: 0;">
              <div class="navbar-collapse sidebar-nav bar-collapse">
                  <ul class="nav navbar-nav">
                      <li class="pl-3 border  bg-gray-200"><a href="#" class="nav-link active-navbar">Thông tin cá nhân</a></li>
                      <li class="pl-3 border"><a href="{{ route('quanlydonhang') }}" class="nav-link">Quản lý đơn hàng</a></li>
                      {{-- <li class="pl-3 border"><a href="#" class="nav-link">Quản lý địa chỉ</a></li> --}}
                      {{-- <li class="pl-3 border"><a href="#" class="nav-link">Menu Item 4</a></li> --}}
                  </ul>
              </div><!--/.nav-collapse -->
          </div>
      </div>
      <div class="log-out">
          <a href="{{ route('dangxuat') }}" class="nav-link">Đăng xuất</a>
      </div>
  </div>