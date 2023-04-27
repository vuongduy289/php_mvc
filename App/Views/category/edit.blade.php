@extends('layouts.master')

@section('title', 'Chỉnh sửa danh mục')

@section('content-title', 'Chỉnh sửa danh mục')
@section('content')

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
    <form action="{{BASE_URL}}categories/update/{{$category->id}}" method="post">
        <label for="">Name</label>
        <br>
        <input class="input1" type="text" value="{{$category->name}}" name="name">
        <pre></pre>
        <label for="">Status</label>
        <br>
        <input type="radio" name="status" value="1" {{$category->status == 1 ? 'checked' : ''}}>Kích hoạt
        <input type="radio" name="status" value="0" {{$category->status == 0 ? 'checked' : ''}}>Không kích hoạt
        <pre></pre>
        <button type="submit">Update</button>
    </form>
</div>

@endsection