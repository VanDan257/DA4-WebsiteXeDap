@extends('layout\layout')


@section('content')

@include('layout.slide')

    <!-- Offer Start -->
    <div class="container offer pt-5">
        <div class="row">
            <div class="col-md-6 pb-4">
                <div class="offer-item position-relative bg-dark-200 text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="\FileUpLoad\images\demo1.jpg" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-light mb-3">Dòng xe bán chạy nhất thị trường</h5>
                        <h1 class="mb-4 text-light font-weight-semi-bold">ROAD</h1>
                        <a href="" class="btn btn-outline-primary--light py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="offer-item position-relative bg-dark-200 text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="http://www.sintchristophorus.nl/wp-content/uploads/2019/01/Pilot-cycles-banner.jpg" height="100%" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-light mb-3">20% off the all order</h5>
                        <h1 class="mb-4 text-light font-weight-semi-bold">MODERN</h1>
                        <a href="" class="btn btn-outline-primary--light py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">FLASH SALE</span></h2>
        </div>
        <div class="row pb-3">
            <div class="owl-carousel related-carousel">
                @foreach ($productsale as $sp)
                    <div class="card product-item border-0 mb-4" data-index="1">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="product-thumbnail img-fluid w-100" src="/FileUpLoad/images/{{ $sp->Image }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="product-name text-truncate mb-3">{{ $sp->Title }} </h6>
                            <div class="d-flex justify-content-center">
                                <h6 class="product-price">{{ number_format($sp->PromotionPrice, 0, ',', '.') }}VNĐ</h6><h6 class="text-muted ml-2"><del>{{ number_format($sp->Price, 0, ',', '.') }}VNĐ</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('chitietsanpham', $sp->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            {{-- <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a> --}}
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $sp->id }}" name="id">
                                <input type="hidden" value="{{ $sp->Title }}" name="name">
                                <input type="hidden" value="{{ $sp->Image }}" name="image">
                                <input type="hidden" value="{{ $sp->Price }}" name="price">
                                <input type="hidden" value="1" name="quantity">
                                <button class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="subcribe bg-gray-900">
        <div class="container my-5">
            <div class="row justify-content-md-center py-5 ">
                <div class="col-md-6 col-12 py-5">
                    <div class="text-center mb-2 pb-2">
                        <h2 class=" text-light px-5 mb-3">REGISTER</h2>
                        <p class="text-light">Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                    </div>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-4" placeholder="Email...">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4 text-light">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

    <!-- Products Start -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-4">
                    <h2 class="section-title px-5"><span class="px-2">Featured Product</span></h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter="."></li>
                        <li data-filter=".xedaproad">XE ĐẠP ĐUA (ROAD)</li>
                        <li data-filter=".xedapmtb">XE ĐẠP LEO NÚI(MTB)</li>
                        <li data-filter=".xedaptouring">XE ĐẠP ĐƯỜNG DÀI(TOURING)</li>
                        <li data-filter=".xedapcity">XE ĐẠP THÀNH PHỐ (CITY)</li>
                        <li data-filter=".xedaptreem">XE ĐẠP TRẺ EM</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter pb-3">
            @foreach ($products as $sp)
                @if($sp->CateID == 1)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1 mix xedaproad">
                        <div class="featured__item">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="product-thumbnail img-fluid w-100" src="/FileUpLoad/images/{{ $sp->Image }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="product-name text-truncate mb-3">{{ $sp->Title }} </h6>
                                    <div class="d-flex justify-content-center">
                                        @if ($sp->PromotionPrice != 0)
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                            <h6 class="text-muted ml-2"><del>{{ number_format($sp->PromotionPrice, 0, ',', '.') ?? 0  }}VNĐ</del></h6>
                                        
                                        @else
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                                
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('chitietsanpham', $sp->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $sp->id }}" name="id">
                                        <input type="hidden" value="{{ $sp->Title }}" name="name">
                                        <input type="hidden" value="{{ $sp->Image }}" name="image">
                                        <input type="hidden" value="{{ $sp->Price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                 @if($sp->CateID == 2)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1 mix xedapmtb">
                        <div class="featured__item">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="product-thumbnail img-fluid w-100" src="/FileUpLoad/images/{{ $sp->Image }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="product-name text-truncate mb-3">{{ $sp->Title }} </h6>
                                    <div class="d-flex justify-content-center">
                                        @if ($sp->PromotionPrice != 0)
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                            <h6 class="text-muted ml-2"><del>{{ number_format($sp->PromotionPrice, 0, ',', '.') ?? 0  }}VNĐ</del></h6>
                                        
                                        @else
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                                
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('chitietsanpham', $sp->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $sp->id }}" name="id">
                                        <input type="hidden" value="{{ $sp->Title }}" name="name">
                                        <input type="hidden" value="{{ $sp->Image }}" name="image">
                                        <input type="hidden" value="{{ $sp->Price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($sp->CateID == 3)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1 mix xedaptouring">
                        <div class="featured__item">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="product-thumbnail img-fluid w-100" src="/FileUpLoad/images/{{ $sp->Image }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="product-name text-truncate mb-3">{{ $sp->Title }} </h6>
                                    <div class="d-flex justify-content-center">
                                        @if ($sp->PromotionPrice != 0)
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                            <h6 class="text-muted ml-2"><del>{{ number_format($sp->PromotionPrice, 0, ',', '.') ?? 0  }}VNĐ</del></h6>
                                        
                                        @else
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                                
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('chitietsanpham', $sp->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $sp->id }}" name="id">
                                        <input type="hidden" value="{{ $sp->Title }}" name="name">
                                        <input type="hidden" value="{{ $sp->Image }}" name="image">
                                        <input type="hidden" value="{{ $sp->Price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($sp->CateID == 4)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1 mix xedapcity">
                        <div class="featured__item">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="product-thumbnail img-fluid w-100" src="/FileUpLoad/images/{{ $sp->Image }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="product-name text-truncate mb-3">{{ $sp->Title }} </h6>
                                    <div class="d-flex justify-content-center">
                                        @if ($sp->PromotionPrice != 0)
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                            <h6 class="text-muted ml-2"><del>{{ number_format($sp->PromotionPrice, 0, ',', '.') ?? 0  }}VNĐ</del></h6>
                                        
                                        @else
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                                
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('chitietsanpham', $sp->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $sp->id }}" name="id">
                                        <input type="hidden" value="{{ $sp->Title }}" name="name">
                                        <input type="hidden" value="{{ $sp->Image }}" name="image">
                                        <input type="hidden" value="{{ $sp->Price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($sp->CateID == 5)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1 mix xedaptreem">
                        <div class="featured__item">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="product-thumbnail img-fluid w-100" src="/FileUpLoad/images/{{ $sp->Image }}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="product-name text-truncate mb-3">{{ $sp->Title }} </h6>
                                    <div class="d-flex justify-content-center">
                                        @if ($sp->PromotionPrice != 0)
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                            <h6 class="text-muted ml-2"><del>{{ number_format($sp->PromotionPrice, 0, ',', '.') ?? 0  }}VNĐ</del></h6>
                                        
                                        @else
                                            <h6>{{ number_format($sp->Price, 0, ',', '.') ?? 'Liên hệ'  }}VNĐ</h6>
                                                
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('chitietsanpham', $sp->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $sp->id }}" name="id">
                                        <input type="hidden" value="{{ $sp->Title }}" name="name">
                                        <input type="hidden" value="{{ $sp->Image }}" name="image">
                                        <input type="hidden" value="{{ $sp->Price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
    <!-- Products End -->


    {{-- Danh sách nhà cung cấp --}}
    <!-- Vendor Start -->
    {{-- <div class="container py-5">
        <div class="row ">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Vendor End -->



@endsection