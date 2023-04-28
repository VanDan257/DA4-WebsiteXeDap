@extends('layout.layout')

@section('content')
     <!-- Checkout Start -->
     <div class="container-fluid pt-5">
        <form method="POST" action="{{ route('thanhtoanstore') }}" class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin người nhận</h4>
                    <div class="row">
                        @csrf
                        <div class="col-md-6 form-group">
                            <label>Họ và tên</label>
                            <input class="form-control" name="Recipient" type="text">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" name="Email" type="text">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" name="Phone" type="text">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" name="DeliveryAddress" type="text">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ghi chú</label>
                            <input class="form-control" name="Note" type="text">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <a href="#" class="link-dark">Create an account</a>
                            </div>
                        </div>
                        <input type="hidden" name="TotalPay" value="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-gray-200 border-0">
                        <h4 class="font-weight-semi-bold m-0">Thông tin đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Giỏ hàng</h5>
                        <div class="order-products">
                            @foreach ($carts as $item)
                                
                                <div class="d-flex justify-content-between">
                                    <p>{{ $item->name }}</p>
                                    <p>{{ number_format($item->price, 0, ',', '.') }}VNĐ</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền</h5>
                            <h5 class="total-checkout font-weight-bold">{{ number_format($total, 0, ',', '.') }}VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-gray-200 border-0">
                        <h4 class="font-weight-semi-bold m-0">Thanh Toán</h4>
                    </div>
                    {{-- <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" name="MethodPay" value="Paypal" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label"  name="MethodPay" value="Thanh toán khi nhận hàng" for="directcheck">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" name="MethodPay" value="Chuyển khoản" for="banktransfer">Chuyển khoản</label>
                            </div>
                        </div>
                    </div>--}}
                    <input type="hidden" name="Status" value="Đã xác nhận"> 
                    <input type="hidden" name="TotalPay" value="{{ $total }}"> 
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->
@endsection