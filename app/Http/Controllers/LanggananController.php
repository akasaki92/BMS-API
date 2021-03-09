<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Inet;
use App\Models\Listrik;
use App\Models\Pulsa;
use App\Models\Tagihan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LanggananController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $user = Auth::user();
        $tagihan = Tagihan::where('users_id', $user->id);
        $tagihan_sort = $tagihan->orderBy('created_at', 'ASC')->get();
        return response()->json([
            'message' => 'List semua langganan berdasarkan tanggal pembuatan',
            'data' => $tagihan_sort
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_langganan' => 'required|in:inet,listrik,pulsa'
        ]);
        $langganan = $request->input('jenis_langganan');
        $user = Auth::user();
        $langganan = ucfirst($langganan);
        $data_input = [];
        if ($langganan == 'Inet') {
            $this->validate($request, [
                'nama_langganan' => 'required',
                'id_pelanggan' => 'required',
                'rentang_waktu' => 'required|integer|max:30|min:7',
                'nominal' => 'required',
                'tgl_mulai' => 'required|date',
            ]);
            $data_input = [
                'users_id' => $user->id,
                'nama_langganan' => $request->input('nama_langganan'),
                'id_pelanggan' => $request->input('id_pelanggan'),
            ];
        } else if ($langganan == 'Pulsa') {
            $this->validate($request, [
                'nama_langganan' => 'required',
                'nomor_telp' => 'required',
                'rentang_waktu' => 'required|integer|max:30|min:7',
                'nominal' => 'required',
                'tgl_mulai' => 'required|date',
            ]);
            $data_input = [
                'users_id' => $user->id,
                'nama_langganan' => $request->input('nama_langganan'),
                'nomor_telp' => $request->input('nomor_telp'),
            ];
        } else if ($langganan == 'Listrik') {
            $this->validate($request, [
                'nama_langganan' => 'required',
                'id_pelanggan' => 'required',
                'jenis_pembayaran' => 'required|in:Prabayar,Paskabayar',
                'rentang_waktu' => 'required|integer|max:30|min:7',
                'nominal' => 'required',
                'tgl_mulai' => 'required|date',
            ]);
            $data_input = [
                'users_id' => $user->id,
                'nama_langganan' => $request->input('nama_langganan'),
                'id_pelanggan' => $request->input('id_pelanggan'),
                'jenis_pembayaran' => $request->input('jenis_pembayaran')
            ];
        } else {
            return response()->json([
                'message' => 'Not Accepted!'
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
        try {
            $langganan_buat = Helpers::AddNewLangganan($langganan, $data_input);
            Tagihan::create([
                'users_id' => $user->id,
                'kategori' => $langganan,
                'kategori_id' => $langganan_buat->id,
                'mulai_tagihan' => $request->input('tgl_mulai'),
                'rentang_waktu' => $request->input('rentang_waktu'),
                'harga_tagihan' => $request->input('nominal')
            ]);
            $response = [
                'message' => 'Langganan baru berhasil dibuat',
                'data' => $request->all()
            ];
            return response()->json($response, Response::HTTP_CREATED);

        } catch (QueryException $err) {
            return response()->json([
                'message' => 'Gagal membuat data langganan baru',
                'data' => $err->errorInfo
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        $langganan = Tagihan::findOrFail($id);
        if ($langganan->users_id == Auth::user()->id) {
            $response = [
                'message' => 'Detail dari langganan berID - ' .$langganan->id,
                'data' => $langganan
            ];
            return response()->json($response, Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'Not Accepted!'
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function update(Request $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $user = Auth::user();
        if ($tagihan->users_id == $user->id) {
            $this->validate($request, [
                'jenis_langganan' => 'required|in:inet,listrik,pulsa'
            ]);
            $langganan = $request->input('jenis_langganan');
            $langganan = ucfirst($langganan);
            $data_input = [];
            if ($langganan == 'Inet') {
                $this->validate($request, [
                    'nama_langganan' => 'required',
                    'id_pelanggan' => 'required',
                    'rentang_waktu' => 'required|integer|max:30|min:7',
                    'nominal' => 'required',
                    'tgl_mulai' => 'required|date',
                ]);
                $data_input = [
                    'users_id' => $user->id,
                    'nama_langganan' => $request->input('nama_langganan'),
                    'id_pelanggan' => $request->input('id_pelanggan'),
                ];
            } else if ($langganan == 'Pulsa') {
                $this->validate($request, [
                    'nama_langganan' => 'required',
                    'nomor_telp' => 'required',
                    'rentang_waktu' => 'required|integer|max:30|min:7',
                    'nominal' => 'required',
                    'tgl_mulai' => 'required|date',
                ]);
                $data_input = [
                    'users_id' => $user->id,
                    'nama_langganan' => $request->input('nama_langganan'),
                    'nomor_telp' => $request->input('nomor_telp'),
                ];
            } else if ($langganan == 'Listrik') {
                $this->validate($request, [
                    'nama_langganan' => 'required',
                    'id_pelanggan' => 'required',
                    'jenis_pembayaran' => 'required|in:Prabayar,Paskabayar',
                    'rentang_waktu' => 'required|integer|max:30|min:7',
                    'nominal' => 'required',
                    'tgl_mulai' => 'required|date',
                ]);
                $data_input = [
                    'users_id' => $user->id,
                    'nama_langganan' => $request->input('nama_langganan'),
                    'id_pelanggan' => $request->input('id_pelanggan'),
                    'jenis_pembayaran' => $request->input('jenis_pembayaran')
                ];
            } else {
                return response()->json([
                    'message' => 'Not Accepted!'
                ], Response::HTTP_NOT_ACCEPTABLE);
            }


            if ($tagihan->kategori == $langganan) {
                try {
                    $newLangganan = Helpers::UpdateLangganan($langganan, $tagihan->kategori_id, $data_input);
                    $tagihan->update([
                        'users_id' => $user->id,
                        'kategori' => $langganan,
                        'kategori_id' => $newLangganan,
                        'mulai_tagihan' => $request->input('tgl_mulai'),
                        'rentang_waktu' => $request->input('rentang_waktu'),
                        'harga_tagihan' => $request->input('nominal')
                    ]);
                    $response = [
                        'message' => 'Langganan berhasil diubah',
                        'data' => $request->all()
                    ];
                    return response()->json($response, Response::HTTP_CREATED);
                } catch (QueryException $err) {
                    return response()->json([
                        'message' => 'Gagal mengubah data langganan',
                        'data' => $err->errorInfo
                    ], Response::HTTP_INTERNAL_SERVER_ERROR);
                }
            } else {
                try {
                    Helpers::DeleteLangganan($tagihan->kategori, $tagihan->kategori_id);
                    $newLangganan = Helpers::AddNewLangganan($langganan, $data_input);
                    $tagihan->update([
                        'kategori' => $langganan,
                        'kategori_id' => $newLangganan->id,
                        'mulai_tagihan' => $request->input('tgl_mulai'),
                        'rentang_waktu' => $request->input('rentang_waktu'),
                        'harga_tagihan' => $request->input('nominal')
                    ]);
                    $response = [
                        'message' => 'Langganan berhasil diubah',
                        'data' => $request->all()
                    ];
                    return response()->json($response, Response::HTTP_CREATED);
                } catch (QueryException $err) {
                    return response()->json([
                        'message' => 'Gagal mengubah data langganan',
                        'data' => $err->errorInfo
                    ], Response::HTTP_INTERNAL_SERVER_ERROR);
                }
            }
        } else {
            return response()->json([
                'message' => 'Not Accepted!'
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        $langganan = Tagihan::findOrFail($id);
        if ($langganan->users_id == Auth::user()->id) {
            try {
                Helpers::DeleteLangganan($langganan->kategori, $langganan->kategori_id);
                $langganan->delete();

                $response = [
                    'message' => 'Data langganan berhasil dihapus',
                ];
                return response()->json($response, Response::HTTP_OK);

            } catch (QueryException $err) {
                return response()->json([
                    'message' => 'Gagal mengubah data langganan',
                    'data' => $err->errorInfo
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            return response()->json([
                'message' => 'Not Accepted!'
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

}
