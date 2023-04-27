<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Tạo mới danh mục')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', 'Tạo mới danh mục')
@section('content')

<!-- Với blade -->
<style>
    a{
        text-decoration: none;
    }

    .div-content{
        padding: 10px 20px;
        background-color: white;
        margin: 20px 0;
    }

    form .input1{
        width: 300px;
    }
    
    form select{
        width: 300px;
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
</style>
<a class="div-a" href="{{BASE_URL}}categories">Danh sách</a>
<div class="div-content">
    <form action="{{BASE_URL}}categories/store" method="post">
        <label for="">Name</label>
        <br>
        <input class="input1" type="text" name="name">
        <pre></pre>
        <label for="">Status</label>
        <br>
        <input type="radio" name="status" value="1">Kích hoạt
        <input type="radio" name="status" value="0">Không kích hoạt
        <pre></pre>
        <button type="submit">Add</button>
    </form>
</div>
@endsection