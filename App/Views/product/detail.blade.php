<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Chi tiết sản phẩm')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', 'Chi tiết sản phẩm')
@section('content')

<!-- Với blade -->
<style>
    a{
        text-decoration: none;
    }

    .div-content{
        display: flex;
        padding: 20px 20px;
        background-color: white;
        margin: 20px 0;
    }

    .div-infor{
        margin-left: 50px;
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
</style>

<div class="div-late">
    <a class="div-a" href="{{BASE_URL}}products">Danh sách</a>
    <a class="div-a" href="{{BASE_URL}}products/edit/{{$product->id}}">Edit</a>
    <a class="div-a" href="{{BASE_URL}}products/delete/{{$product->id}}">
        <button onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
    </a>
</div>
<div class="div-content">
    <div>
        <img src="{{BASE_URL}}{{$product->image_url}}" width="600px">
    </div>
    <div class="div-infor">
        <h4>{{$product->name}}</h4>
        <pre></pre>
        <h1>{{$product->price}} VNĐ</h1>
        <pre></pre>
        <label for="">Category: </label>
        <p>{{$product->category_id}}</p>
        <label for="">Status</label>
        <p>{{$product->status ? 'Kích hoạt' : 'Không kích hoạt'}}</p>
    </div> 
</div>

    
@endsection