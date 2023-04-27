@extends('layouts.master')

@section('title', 'Danh sách sản phẩm')

@section('content-title', "Danh sách sản phẩm ($count)")
@section('content')
    <style>
        a{
            text-decoration: none;
        }
        .div-content{
            padding: 10px 5px;
            background-color: white;
        }
        .add{
            float: right;
            border: 1px solid #0d6efd;
            padding: 5px;
            background-color: #0d6efd;
            color: white;
            margin-bottom: 10px;
        }
        .add:hover{
            background-color: white;
            color: #0d6efd;
        }
        .add i{
            margin-right: 5px;
        }
        .detail{
            color: red;
        }
    </style>
    <div class="div-content">
        <div>
            <input type="search" name="keyword" placeholder="Tìm kiếm">
            <a href="{{BASE_URL}}products/{{$keyword}}"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a class="add" href="{{BASE_URL}}products/create"><i class="fa-regular fa-square-plus"></i>Thêm mới</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Name</b></td>
                    <td><b>Image</b></td>
                    <td><b>Price</b></td>
                    <td><b>Status</b></td>
                    <td><b>Information</b></td>
                    <td><b>Edit</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td><img src="{{$product->image_url}}" width="100px"></td>
                        <td>{{$product->price}} VNĐ</td>
                        <td>{{$product->status ? 'Kích hoạt' : 'Không kích hoạt'}}</td>
                        <td><a class="detail" href="{{BASE_URL}}products/detail/{{$product->id}}">Chi tiết</a></td>
                        <td>
                            <a href="{{BASE_URL}}products/edit/{{$product->id}}">
                                <button><i class="fa-solid fa-pen-to-square"></i></button> 
                            </a>
                            /
                            <a href="{{BASE_URL}}products/delete/{{$product->id}}">
                                <button onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa-solid fa-trash-can"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
