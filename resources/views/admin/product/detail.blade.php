@extends('admin.layout.layout')

@section('NamePage')
    Xe đạp
@endsection

@section('content')
<div class="row">
    <h4>Thông tin sản phẩm {{ $product->Title }}</h4>
    <hr />
    <dl class="dl-horizontal">
        
        <dd>
           Hình ảnh
        </dd>

        <dt>
            <img src="/FileUpLoad/images/{{ $product->Image }}" style="width: 200px;" />
        </dt>
        
        <dt>
            Tiêu đề
        </dt>
        
        <dd>
            {{ $product->Title }}
        </dd>

        <dt>
            Tên danh mục
        </dt>

        <dd>
            {{ $product->CateName }}
        </dd>

        <dt>
            Mô tả
        </dt>

        <dd>
            {!! $product->Description !!}
        </dd>

        <dt>
            Giá
        </dt>

        <dd>
            {{ number_format($product->Price, 0, ',', '.') }}VNĐ
        </dd>

        <dt>
            Giá khuyến mãi
        </dt>

        <dd>
            {{ number_format($product->PromotionPrice, 0, ',', '.') }}VNĐ
        </dd>

        <dt>
            Số lượng
        </dt>

        <dd>
            {{ $product->Amount }} sản phẩm
        </dd>

    </dl>
    <div class="col-md-6">
        <div class="card-body">
          <h3>Thông Số Kỹ Thuật</h3>
          @foreach ($specifications as $tskt)
            <div class="form-group">
              <dd>{{ $tskt->SpeName }}</dd>
              <dt>{{ $tskt->Description }}</dt>
              {{-- <input type="hidden" value="{{ $tskt->SpeName }}" name="SpeName[]">
              <input type="text" value="{{ $tskt->Description }}" id="enterdes" class="form-control" id="SpeDescription" name="SpeDescription[]">     --}}
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-6">
        {{-- <a href="{{ route('indeximg', $product->id) }}">Danh sách ảnh sản phẩm</a> --}}
        <h3>Danh Sách Hình Ảnh</h3>
        <table class="table table-bordered table-striped" id="dataTable">
          <thead>
              <tr>
                  <th>
                      Hình ảnh
                  </th>
                  <th>
                      Tiêu đề
                  </th>
                  <th>
                      Đặt mặc định
                  </th>
                  <th>
                      Vị trí
                  </th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              @foreach ($imageproducts as $imageproduct)
                  <tr>
                      <td>
                              <img src="/FileUpLoad/images/{{$imageproduct->ImagePath}}" style="width: 150px;" />
                          </a>
                      </td>
                      <td>
                          {{$imageproduct->Caption}}
                      </td>
                      <td>
                          {{$imageproduct->IsDefault}}
                      </td>
                      <td>
                          {{$imageproduct->SortOrder}}
                      </td>
                      <td>
                        <form action="{{ route('deleteimg', $imageproduct->id) }}" id="FormDeleteImg" method="post">
                          <a href="{{ route('editimg',$imageproduct->id) }}"><i class="text-warning fa-solid fa-edit"></i></a>
                          <input type="hidden" name="id" value="{{ $imageproduct->id }}">
                          @csrf
                          {{-- @method('DELETE') --}}
                          <button type="submit" style="border: none; outline: none"><i class="text-danger fa-solid fa-trash"></i></button>
                        </form>                          
                      </td>
                  </tr>
              @endforeach
          </tbody>
          <div style="margin-top: 24px">
            <a href="{{ route('createimg', $product->id) }}" class="btn btn-success">Thêm mới ảnh sản phẩm</a>
          </div>
        </table>
      </div>
</div>
<p>
    <a class="btn btn-behance" href="{{ route('editsp', $product->id) }}">Sửa sản phẩm</a> |
    <a href="{{ route('indexsp') }}">Quay lại</a>
</p>
@endsection