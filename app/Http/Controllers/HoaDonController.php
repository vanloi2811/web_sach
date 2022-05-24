<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\KhachHang;
use App\Models\Sach;

use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    public function index(Request $request) {
        $paginates = $request->pagination ?? 5;
        $hoadons = HoaDon::join('khachhang', 'khachhang.id','=','hoadon.id_KhachHang')
        ->select('hoadon.*', 'khachhang.TenKH')
        ->orderBy('hoadon.id', 'ASC')
        ->paginate($paginates);
        // ->get();

        return view('hoadon_admin.index')->with('hoadons', $hoadons)
        ->with('paginates', $paginates);
    }

    public function detail($id)
    {
        $chitiethoadons = ChiTietHoaDon::join('sach', 'sach.id','=','chitiethoadon.id_Sach')
        ->select('chitiethoadon.*', 'sach.TenSach')
        ->find($id);
        // ->get();

        return view('hoadon_admin.detailhoadon')->with('chitiethoadons', $chitiethoadons);
    }
}
