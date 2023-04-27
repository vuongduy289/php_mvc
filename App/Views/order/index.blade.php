<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Danh sách đơn hàng')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', "Danh sách đơn hàng ($count)")
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
    .status{
        width: 100px;
        background-color: red;
        color: white;
        padding: 5px;
        border-radius: 5px;
        text-align: center;
    }
</style>
<div class="div-content">
    <a class="add" href="{{BASE_URL}}orders/create"><i class="fa-regular fa-square-plus"></i>Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>User ID</b></td>
                <td><b>Date</b></td>
                <td><b>Status</b></td>
                <td><b>Information</b></td>
                <td><b>Edit</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->date}}</td>
                    <td><div class="status">{{$order->status == 2 ? 'Completed' : ($order->status == 1 ? 'Pending' : 'Failed')}}</div></td>
                    <td><a class="detail" href="{{BASE_URL}}orders/detail/{{$order->id}}">Chi tiết</a></td>
                    <td>
                        <a href="{{BASE_URL}}orders/edit/{{$order->id}}">
                            <button><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        /
                        <a href="{{BASE_URL}}orders/delete/{{$order->id}}">
                            <button onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa-solid fa-trash-can"></i> </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
