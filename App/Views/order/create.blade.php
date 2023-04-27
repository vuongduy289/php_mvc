<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Tạo mới đơn hàng')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', 'Tạo mới đơn hàng')
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

<a class="div-a" href="{{BASE_URL}}orders">Danh sách</a>
<div class="div-content">
    <form action="{{BASE_URL}}orders/store" method="post">
        <label for="">User</label>
        <br>
        <select name="user_id" id="">
            <?php
                $conn = mysqli_connect('localhost','root','','MVC_17202');
                $sql = "SELECT * FROM `users` WHERE `status` = 1";
                $result = mysqli_query($conn,$sql);
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($users as $user) { 
            ?> 
                <option value="<?= $user['id']?>"><?= $user['name'] ?></option>
            <?php } ?>
        </select>
        <pre></pre>
        <label for="">Date</label>
        <br>
        <input class="input1" type="text" name="date">
        <pre></pre>
        <label for="">Status</label>
        <br>
        <input type="radio" name="status" value="0" > Failed
        <input type="radio" name="status" value="1"> Pending
        <input type="radio" name="status" value="2"> Completed
        <pre></pre>
        <button type="submit">Add</button>
    </form>
</div>

@endsection