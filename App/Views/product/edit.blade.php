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
<a class="div-a" href="{{BASE_URL}}products">Danh sách</a>
<div class="div-content">
    <form action="{{BASE_URL}}products/update/{{$product->id}}" method="post" enctype="multipart/form-data">
        <label for="">Name</label>
        <br>
        <input class="input1" type="text" value="{{$product->name}}" name="name">
        <pre></pre>
        <label for="">Image</label>
        <br>
        <input type="file" name="image_url">
        <pre></pre>
        <img src="{{BASE_URL}}{{$product->image_url}}" width="400px">
        <pre></pre>
        <label for="">Price</label>
        <br>
        <input class="input1" type="text" value="{{$product->price}}" name="price">
        <pre></pre>
        <label for="">Category</label>
        <br>
        <select name="category_id">
            <?php
                $conn = mysqli_connect('localhost','root','','MVC_17202');
                $sql = "SELECT * FROM `categories` WHERE `status` = 1";
                $result = mysqli_query($conn, $sql);
                $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
            ?>
            <?php foreach ($categories as $category) : ?>
                <?php if ($category['id'] == $product->category_id) : ?>
                    <option value="<?= $category['id'] ?>" selected><?= $category['name'] ?></option>
                <?php else : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
        <pre></pre>
        <label for="">Status</label>
        <br>
        <input type="radio" name="status" value="1" {{$product->status == 1 ? 'checked' : ''}}>Kích hoạt
        <input type="radio" name="status" value="0" {{$product->status == 0 ? 'checked' : ''}}>Không kích hoạt
        <pre></pre>
        <button type="submit">Update</button>
    </form>
</div>

@endsection