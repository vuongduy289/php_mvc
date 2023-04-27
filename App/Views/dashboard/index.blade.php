<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Dashboard')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', 'Dashboard')
@section('content')

<!-- Với blade -->
<style>
    a{
        text-decoration: none;
    }
</style>

@endsection
