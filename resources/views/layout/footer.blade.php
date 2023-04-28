<div class="footer bg-gray-900">
    <div class="container text-light mt-5 pt-5">
        <div class="row  pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h2 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">CYCLE</span><span class="text-light">SHOP</span></h2>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-light mr-3"></i>Đình Dù - Văn Lâm - Hưng Yên</p>
                <p class="mb-2"><i class="fa fa-envelope text-light mr-3"></i>vandan250702@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-light mr-3"></i>+84 343 628 648</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    {{-- <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-light mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-light mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-light mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-light mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-light mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-light" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div> --}}
                    <div class="col-md-6 mb-6">
                        <h5 class="font-weight-bold text-light mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="{{ route('home') }}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-light mb-2" href="{{ route('danhmucsanpham') }}"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-light mb-2" href="{{ route('giohang') }}"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-light mb-2" href="{{ route('thanhtoan') }}"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-light" href="{{ route('tintuc') }}"><i class="fa fa-angle-right mr-2"></i>BLOG</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <h5 class="font-weight-bold text-light mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>