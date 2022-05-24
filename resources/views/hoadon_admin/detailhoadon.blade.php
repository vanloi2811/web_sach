@extends('layouts.appadmin')
@section('content')

    <div class="card-body">
        <form action="" >
            @foreach($chitiethoadons as $chitiethoadon)
                <div class="form-group">
                    <label for="inputName">Mã danh mục hóa đơn: {{$chitiethoadon->id}}</label>
                    <!-- <input type="text" id="inputName" name="TenKH" class="form-control" value=""> -->
                </div>
                <div class="form-group">
                    <label for="inputDescription">Mã hóa đơn: {{$chitiethoadon->id_HoaDon}}</label>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Tên sách: {{$chitiethoadon->TenSach}}</label>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Gía sách: {{$chitiethoadon->GiaBan}}</label>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Số lượng: {{$chitiethoadon->SoLuong}}</label>
                </div>
            @endforeach
        </form>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="/admin/hoadons" class="btn btn-secondary" style="float:right; margin-right: 2%">Thoát</a>
        </div>
    </div>

@endsection