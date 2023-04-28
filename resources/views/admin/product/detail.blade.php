@extends('admin.layout.layout')

@section('content')
<div>
    <h4>Product</h4>
    <hr />
    <dl class="dl-horizontal">
        
        <dd>
           Hình ảnh
        </dd>

        <dt>
            <img src="/FileUpLoad/images/{{ $data->Image }}" style="width: 200px;" />
        </dt>
        
        <dt>
            Tiêu đề
        </dt>
        
        <dd>
            {{ $data->Title }}
        </dd>

        <dt>
            Tên danh mục
        </dt>

        <dd>
            {{ $data->CateName }}
        </dd>

        <dt>
            Mô tả
        </dt>

        <dd>
            {{ $data->Description }}
        </dd>

        <dt>
            Giá
        </dt>

        <dd>
            {{ $data->Price }}
        </dd>

        <dt>
            Giá khuyến mãi
        </dt>

        <dd>
            {{ $data->PromotionPrice }}
        </dd>

    </dl>
</div>
<p>
    <a class="btn btn-behance" href="{{ route('editsp', $data->id) }}">Sửa sản phẩm</a> |
    <a href="{{ route('indexsp') }}">Quay lại</a>
</p>
@endsection