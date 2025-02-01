<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:20',
            'model' => 'required|string',
            'tanggal_sewa' => 'required|date',
        ]);

        $customer = Customer::create([
            'nama' => $request->input('nama'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'no_ktp' => $request->input('no_ktp'),
        ]);

        $customerId = $customer->id;
        $car = Car::where('model', $request->input('model'))->first();

        Car::where('id', $car->id)->update(['status' => 'disewa']);

        if (!$car) {
            return response()->json(['error' => 'Mobil tidak ditemukan'], 404);
        }

        $tanggalSewa = Carbon::parse($request->input('tanggal_sewa'));
        $tanggalKembali = $tanggalSewa->addDays(3);

        $transaction = Transaction::create([
            'customer_id' => $customerId,
            'car_id' => $car->id,
            'tanggal_sewa' => $tanggalSewa,
            'tanggal_kembali' => $tanggalKembali,
        ]);

        $payment = Payment::create([
            'transaction_id' => $transaction->id,
            'metode' => $request->metode,
            'jumlah_bayar' => 0,
            'tanggal_bayar' => null
        ]);

        return response()->json(['message' => 'Transaksi berhasil disimpan', 'data' => $transaction]);
    }
}
