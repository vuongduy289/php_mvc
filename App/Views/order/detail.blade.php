<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Chi tiết đơn hàng')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', 'Chi tiết đơn hàng')
@section('content')

<!-- Với blade -->
<style>
    a{
        text-decoration: none;
    }
    .div-a button{
        border: none;
        background-color: #0d6efd;
        color: white;
    }
    .div-a{
        border: 1px solid #0d6efd;
        padding: 5px;
        background-color: #0d6efd;
        color: white;
    }
    .div-a:hover{
        background-color: white;
        color: #0d6efd;
    }
    .div-a button:hover{
        background-color: white;
        color: #0d6efd;
    }
    .div-content{
        padding: 0 20px;
        margin: 20px 0;
        background-color: white;
    }
    .content1{
        display: flex;
    }
    .div1{
        width: 100%;
    }
    .div2{
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .div2 p{
        color: red;
    }
    .div4{
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid rgba(0,0,0,.50);
        padding-top: 5px;
    }
    .div4 .h4{
        color: red;
        font-weight: normal;
    }
    .div5{
        display: flex;
    }
    .div5 img{
        width: 150px;
        height: 100px;
        object-fit: cover;
        margin-right: 10px;
    }
    .div6{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
    }
    .div8{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .div8 p{
        margin-block-end: 0;
        margin-right: 20px;
    }
    .div8 h3{
        color: red;
    }


</style>

<div class="div-late">
    <a class="div-a" href="{{BASE_URL}}orders">Danh sách</a>
    <a class="div-a" href="{{BASE_URL}}orders/edit/{{$order->id}}">Edit</a>
    <a class="div-a" href="{{BASE_URL}}orders/delete/{{$order->id}}">
        <button onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
    </a>
</div>
<div class="div-content">
    <div class="content1">
        <div class="div1">
            <div class="div2">
                <h3>ID ORDER: {{$id}}</h3>
                <p>{{$status}}</p>
            </div>
            <div class="div3">
                <div class="div4">
                    <div class="div5">
                        <img src="{{BASE_URL}}public/dist/img/{{$image_url}}">
                        <div>
                            <h4>{{$name}}</h4>
                            <p>Category: {{$category_id}}</p>
                            <p>x{{$quantity}}</p>
                        </div>
                    </div>
                    <h4 class="h4">{{$price}} VNĐ</h4>
                </div>
                <div class="div4">
                    <div class="div5">
                        <img src="{{BASE_URL}}public/dist/img/{{$image_url}}">
                        <div>
                            <h4>{{$name}}</h4>
                            <p>Category: {{$category_id}}</p>
                            <p>x{{$quantity}}</p>
                        </div>
                    </div>
                    <h4 class="h4">{{$price}} VNĐ</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="div6">
        <div class="div7">
            <p>Date: {{$date}}</p>
        </div>
        <div class="div8">
            <p>Tổng số tiền:</p>
            <h3>1420000 VNĐ</h3>
        </div>
    </div>
    
</div>
    
@endsection