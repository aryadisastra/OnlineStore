<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;

class ApiController extends Controller
{
    //Function Order Biasa
    public function Order(Request $request)
    {
        try {
            $getItem = Item::where('id', $request->id)->first();

            //Handling Error Dari Request Dan Jumlah Stok
            if ($request->jumlah < 1) return response()->json(['status'    => 'FAIL', 'message'   => 'Minimal Pembelian Adalah 1']);
            if (!$getItem) return response()->json(['status'    => 'FAIL', 'message'   => 'Produk Tidak Tersedia']);
            if ($getItem->stok == 0) return response()->json(['status'    => 'FAIL', 'message'   => 'Produk Sudah Habis']);
            if ($getItem->stok < $request->jumlah) return response()->json(['status'    => 'FAIL', 'message'   => 'Produk Tidak Cukup']);
            //Handling Error Dari Request Dan Jumlah Stok

            //Pengurangan Stok 
            $getItem->stok  =   $getItem->stok - $request->jumlah;
            $getItem->save();
            //Pengurangan Stok 

            //Save Ke DB
            DB::commit();
            return response()->json([
                'status'    =>  'SUCCES',
                'message'   =>  'Pembelian Berhasil'
            ]);
            //Save Ke DB
        } catch (\Exception $e) {
            //Handling Error Code Atau Server
            DB::rollback();

            return response()->json([
                'status'    =>  'FAIL',
                'message'   =>  'Server Error',
                'debug'     =>  $e->getMessage()
            ], 500);
            //Handling Error Code Atau Server
        }
    }

    //Function Flash Sale
    public function OrderFlash(Request $request)
    {
        try {
            $getItem = Item::where('id', $request->id)->first();

            //Handling Error Flash Sale
            if ($getItem->flag_flash == 0 || $getItem->end_flash <= now()) return response()->json(['status'    => 'FAIL', 'message'   => 'Flash Sale Sudah Tidak Berlaku']);
            if ($getItem->start_flash < now()) return response()->json(['status'    => 'FAIL', 'message'   => 'Flash Sale Belum Berlaku']);
            //Handling Error Flash Sale

            //Handling Error Dari Request Dan Jumlah Stok
            if ($request->jumlah < 1) return response()->json(['status'    => 'FAIL', 'message'   => 'Minimal Pembelian Adalah 1']);
            if (!$getItem) return response()->json(['status'    => 'FAIL', 'message'   => 'Produk Tidak Tersedia']);
            if ($getItem->stok == 0) return response()->json(['status'    => 'FAIL', 'message'   => 'Produk Sudah Habis']);
            if ($getItem->stok < $request->jumlah) return response()->json(['status'    => 'FAIL', 'message'   => 'Produk Tidak Cukup']);
            //Handling Error Dari Request Dan Jumlah Stok

            //Pengurangan Stok 
            $getItem->stok  =   $getItem->stok - $request->jumlah;
            $getItem->save();
            //Pengurangan Stok 

            //Save Ke DB
            DB::commit();
            return response()->json([
                'status'    =>  'SUCCES',
                'message'   =>  'Pembelian Flash Sale Berhasil'
            ]);
            //Save Ke DB
        } catch (\Exception $e) {
            //Handling Error Code Atau Server
            DB::rollback();

            return response()->json([
                'status'    =>  'FAIL',
                'message'   =>  'Server Error',
                'debug'     =>  $e->getMessage()
            ], 500);
            //Handling Error Code Atau Server
        }
    }
}
