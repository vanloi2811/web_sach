@extends('layouts.appadmin')
@section('content')

<div class="main-1">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>10</h3>

            <p>Hóa Đơn</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
    </div>

    <div class="small-box bg-warning">
        <div class="inner">
            <h3>5</h3>

            <p>Khách Hàng</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">Xem thông tin <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<style>

    .bg-info {
        margin-top: 10px;
    }

    .main-1 > div {
        margin-left: 30%;
        margin-right: 30%;
    }

    .inner {
        margin-left: 25%;
    }

    .icon {
        margin-right: 25%;
    }
</style>

@endsection