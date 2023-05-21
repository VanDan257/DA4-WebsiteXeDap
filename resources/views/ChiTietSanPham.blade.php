@extends('layout.layout')

@section('content')



    {{-- <!-- Page Header Start -->
    <div class="container-fluid bg-gray-200 mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End --> --}}


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5 product-item">
            <div class="col-lg-5 pb-5">
                <div id="product-slick-slide" class="slick slide">
                    <div class="product-slick-inner border position-relative">
                        {{-- <div class="product-slick-item">
                            <img class="product-thumbnail w-100 h-100" src="/FileUpLoad/images/{{ $product->Image }}" alt="Image">
                        </div> --}}
                        @foreach ($images as $img)    
                            <div class="product-slick-item">
                                <img class="w-100 h-100" src="/FileUpLoad/images/{{ $img->ImagePath }}" alt="Image">
                            </div>
                        @endforeach
                    </div>

                    <div class="product-navfor-slick-inner border">
                        <div class="row w-100" id="slick-slide-navfor">
                            {{-- @foreach ($images as $img)     --}}
                                <div class="col-lg-3 mw-100">
                                    <div class="product-slick-item">
                                        {{-- <img class="w-100 h-100" src="/FileUpLoad/images/{{ $product->ImagePath }}" alt="Image"> --}}
                                        <img class="w-100 h-100" src="/FileUpLoad/images/img4.png" alt="Image">
                                    </div>
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="product-name font-weight-semi-bold">{{ $product->Title }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{ number_format($product->Price) ?? 'Liên hệ'  }}VNĐ</h3>
                <p class="mb-4">Cam kết từ Xeđạptrựctuyến là đại lý xe đạp chính hãng.Xe mới 100% nguyên thùng, chỉ lắp ráp hoàn chỉnh khi có khách đặt hàng.Bán đúng giá quy định, phiếu bảo hành chính hãng, giá đã bao gồm 10% thuế VAT.Hoàn tiền 100% nếu sản phẩm bán ra
                    là hàng "nhái".Hàng mới 100%, nguồn gốc rõ ràng, đầy đủ phụ ...</p>
                
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-start">
                        <img src="https://img.icons8.com/external-anggara-basic-outline-anggara-putra/32/000000/external-shield-ecommerce-interface-anggara-basic-outline-anggara-putra.png"/>

                        <p class="ml-2">Bảo hành chính hãng 2 năm tại các trung tâm bảo hành hãng</p>
                    </div>

                    <div class="col-lg-6 d-flex align-items-start">
                        <img src="https://img.icons8.com/wired/32/000000/renew-subscription.png"/>

                        <p class="ml-2">Bảo hành có cam kết trong 12 tháng </p>
                    </div>

                    <div class="col-lg-6 d-flex align-items-start">
                        <img src="https://img.icons8.com/ios/32/000000/open-box.png"/>
                        <p class="ml-2">Bộ sản phẩm gồm: Hướng dẫn sử dụng, Hộp, Phiếu bảo hành</p>
                    </div>

                    <div class="col-lg-6 d-flex align-items-start">
                        <img src="https://img.icons8.com/dotty/32/000000/truck--v1.png"/>

                        <p class="ml-2">
                            Hà Nội - Hưng Yên: giao hàng nhanh chóng.<br/>
                            Tỉnh thành khác: giao hàng từ 2 - 10 ngày. Xem chi tiết
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="quantity" class="form-control bg-gray-200 text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->Title }}" name="name">
                        <input type="hidden" value="{{ $product->Image }}" name="image">
                        <input type="hidden" value="{{ $product->Price }}" name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="btn btn-primary btn-add-cart text-light px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                    </form>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Thông số kỹ thuật</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Bình luận</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Mô tả sản phẩm</h4>
                        <p>{!! $product->Description !!}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        {{-- <h4 class="mb-3">Additional Information</h4> --}}
                        <div class="row">
                            <table class="table">
                                <tbody>
                                    @foreach ($specifications as $spe)
                                        <tr>
                                            <td></td>
                                            <td class="font-weight-bold">{{ $spe->SpeName }}:</td>
                                            <td>{{ $spe->Description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star rate-star"></i>
                                        <i class="far fa-star rate-star"></i>
                                        <i class="far fa-star rate-star"></i>
                                        <i class="far fa-star rate-star"></i>
                                        <i class="far fa-star rate-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h3 class="section-title px-5"><span class="px-2">Sản Phẩm tương tự</span></h3>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($sp_tuongtu as $sp)
                        
                        <div class="card product-item border-0">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ $sp->Image }}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $sp->Title }}</h6>
                                <div class="d-flex justify-content-center">
                                    @if ($sp->PromotionPrice != 0)
                                    <h6>{{ number_format($sp->Price) ?? 'Liên hệ'  }}VNĐ</h6>
                                    <h6 class="text-muted ml-2"><del>{{ number_format($sp->PromotionPrice) ?? 0  }}VNĐ</del></h6>
                                
                                @else
                                    <h6>{{ number_format($sp->Price) ?? 'Liên hệ'  }}VNĐ</h6>
                                        
                                @endif
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->



@endsection