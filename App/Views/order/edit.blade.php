@extends('layouts.master')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content-title', 'Chỉnh sửa sản phẩm')
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

<a class="div-a" href="{{BASE_URL}}orders">Danh sách</a>
<div class="div-content">
    <form action="{{BASE_URL}}orders/update/{{$order->id}}" method="post">
        <label for="">User ID</label>
        <br>
        <select name="user_id">
            <?php
                $conn = mysqli_connect('localhost','root','','MVC_17202');
                $sql = "SELECT * FROM `users` WHERE `status` = 1";
                $result = mysqli_query($conn, $sql);
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            ?>
            <?php foreach ($users as $user) : ?>
                <?php if ($user['id'] == $order->user_id) : ?>
                    <option value="<?= $user['id'] ?>" selected><?= $user['name'] ?></option>
                <?php else : ?>
                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
        <pre></pre>
        <label for="">Date</label>
        <br>
        <input class="input1" type="text" value="{{$order->date}}" name="date">
        <pre></pre>
        <label for="">Status</label>
        <br>
        <input type="radio" name="status" value="0" {{$order->status == 0 ? 'checked' : ''}}> Failed
        <input type="radio" name="status" value="1" {{$order->status == 1 ? 'checked' : ''}}> Pending
        <input type="radio" name="status" value="2" {{$order->status == 2 ? 'checked' : ''}}> Completed
        <pre></pre>
        <button type="submit">Update</button>
    </form>
</div>

@endsection