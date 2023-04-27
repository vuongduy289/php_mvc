<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Danh sách danh mục')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', "Danh sách danh mục ($count)")
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
    <a class="add" href="{{BASE_URL}}categories/create"><i class="fa-regular fa-square-plus"></i>Thêm mới</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>Name</b></td>
                <td><b>Status</b></td>
                <td><b>Edit</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->status ? 'Kích hoạt' : 'Không kích hoạt'}}</td>
                    <td>
                        <a href="{{BASE_URL}}categories/edit/{{$category->id}}">
                            <button><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        /
                        <a href="{{BASE_URL}}categories/delete/{{$category->id}}">
                            <button onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa-solid fa-trash-can"></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
