<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Danh sách khách hàng')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', "Danh sách khách hàng ($count)")
@section('content')

<!-- Với blade -->
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
        <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
        <a class="add" href="{{BASE_URL}}users/create"><i class="fa-regular fa-square-plus"></i>Thêm mới</a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>Name</b></td>
                <td><b>Email</b></td>
                <td><b>Avatar</b></td>
                <td><b>Status</b></td>
                <td><b>Edit</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><img src="{{BASE_URL}}{{$user->avatar}}" height="50px"></td>
                    <td>{{$user->status ? 'Kích hoạt' : 'Không kích hoạt'}}</td>
                    <td>
                        <a href="{{BASE_URL}}users/edit/{{$user->id}}">
                            <button><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        /
                        <a href="{{BASE_URL}}users/delete/{{$user->id}}">
                            <button onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa-solid fa-trash-can"></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
