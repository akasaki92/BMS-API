<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Inet;
use App\Models\Listrik;
use App\Models\Pulsa;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $name = Auth::user()->name;
        $bergabung = Helpers::DateNormalize(Auth::user()->created_at);
        $avatar = Auth::user()->avatar;
        $all_tagihan = Tagihan::where('users_id', Auth::user()->id);
        $data_tagihan_sort = $all_tagihan->orderBy('created_at', 'ASC')->paginate(2);
        $tagihan_mendatang = [];
        $i = 0;
        foreach ($data_tagihan_sort as $tagih) {
            $tagih_kat = $tagih->kategori;
            if ($tagih_kat == 'Inet') {
                $nmor_pelanggan = Inet::where('id', $tagih->kategori_id)->first();
                $nama_langganan = $nmor_pelanggan->nama_langganan;
                $nmor_pelanggan = $nmor_pelanggan->id_pelanggan;
            } else if ($tagih_kat == 'Listrik') {
                $nmor_pelanggan = Listrik::where('id', $tagih->kategori_id)->first();
                $nama_langganan = $nmor_pelanggan->nama_langganan;
                $nmor_pelanggan = $nmor_pelanggan->id_pelanggan;
            } else {
                $nmor_pelanggan = Pulsa::where('id', $tagih->kategori_id)->first();
                $nama_langganan = $nmor_pelanggan->nama_langganan;
                $nmor_pelanggan = $nmor_pelanggan->nomor_telp;
            }
            $tagihan_mendatang[$i] = [
                'nama_langganan' => $nama_langganan . ' - ' . $nmor_pelanggan,
                'harga' => 'RP ' . number_format($tagih->harga_tagihan, 2, ',','.')
            ];
            $i++;
        }
        $total_tagih = $all_tagihan->count();
        return response()->json([
            'data' => [
                'nama' => $name,
                'bergabung' => $bergabung,
                'avatar' => $avatar,
                'tagihan_mendatang' => $tagihan_mendatang,
                'total_tagihan' => $total_tagih
            ]
        ], 200);
    }
}
