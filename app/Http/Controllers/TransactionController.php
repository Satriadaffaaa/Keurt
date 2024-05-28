<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
{
    // Check if the current route is for the transaction-page
    if (request()->is('transaction-page')) {
        $transactions = Transaction::all();
        return view('contents.transaction-page', ['Transaction' => $transactions]);
    }

    // If the current route is not for the transaction-page, default to the dashboard-home view
    $transactions = Transaction::all();
    $totalBalance = $transactions->sum('amount');
    return view('contents.dashboard-home', ['Transaction' => $transactions, 'totalBalance' => $totalBalance]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents.add-transaction-page');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Retrieve all input data from the request
        $input = $request->all();

        // Create a new record using the input data
        Transaction::create([
            'transaction' => $input['transaction'],
            'amount' => $input['amount'],
            'date' => $input['date'], // Pastikan untuk menyertakan tanggal
        ]);

        // Opsional: mungkin Anda ingin mengambil data lagi setelah penyisipan
        $data['Transaction'] = Transaction::all();

        // Kembalikan tampilan dengan data
        return view('contents.transaction-page', $data);
    }


    public function edit($id)
    {
        // Mengambil data transaksi berdasarkan ID yang diberikan
        $transaction = Transaction::findOrFail($id);

        // Memuat tampilan edit-transaction-page dan menyertakan data transaksi ke dalamnya
        return view('Contents.edit-transaction-page', compact('transaction'));
    }


    public function update(Request $request, $id)
    {
        $data = Transaction::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        return redirect('transaction-page');
    }

    public function destroy($id)
    {
        $data = Transaction::findOrFail($id);
        $data->delete();
        return redirect('transaction-page');
    }
}
