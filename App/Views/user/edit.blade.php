@extends('layouts.master')

@section('title', 'Chỉnh sửa khách hàng')

@section('content-title', 'Chỉnh sửa khách hàng')
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
        border: 1px solid black;
        padding: 5px; 
        background-color: white;
    }
</style>
<a class="div-a" href="{{BASE_URL}}users">Danh sách</a>
<div class="div-content">
    <form action="{{BASE_URL}}users/update/{{$user->id}}" method="post" enctype="multipart/form-data">
    <label for="">Name</label>
        <br>
        <input class="input1" type="text" value="{{$user->name}}" name="name">
        <pre></pre>
        <label for="">Email</label>
        <br>
        <input class="input1" type="text" value="{{$user->email}}" name="email">
        <pre></pre>
        <label for="">Password</label>
        <br>
        <input class="input1" type="password" value="{{$user->password}}" name="password">
        <pre></pre>
        <label for="">Avatar</label>
        <br>
        <input type="file" name="avatar" value="{{$user->avatar}}">
        <br>
        <img src="{{BASE_URL}}{{$user->avatar}}" width="200px">
        <pre></pre>
        <label for="">Status</label>
        <br>
        <input type="radio" value="1" name="status" {{$user->status == 1 ? 'checked' : ''}}>Kích hoạt
        <input type="radio" value="0" name="status" {{$user->status == 0 ? 'checked' : ''}}>Không kích hoạt
        <pre></pre>
        <button type="submit">Update</button>
    </form>
</div>

@endsection