<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $totalAmount;
    private $totalIncome;
    private $totalExpenses;

    private function calculateTotals()
    {
        $data['Transaction'] = Transaction::all();
        $this->totalAmount = $data['Transaction']->sum('amount');
        $this->totalIncome = $data['Transaction']->where('amount', '>', 0)->sum('amount');
        $this->totalExpenses = $data['Transaction']->where('amount', '<', 0)->sum('amount');
    }


    public function index()
{
    // Check if the current route is for the transaction-page
    if (request()->is('transaction-page')) {
        $this->calculateTotals();
        $transactions = Transaction::all();
        return view('contents.transaction-page', [
            'Transaction' => $transactions,
            'totalAmount' => $this->totalAmount,
            'totalIncome' => $this->totalIncome,
            'totalExpenses' => $this->totalExpenses
        ]);
    }

    // If the current route is not for the transaction-page, default to the dashboard-home view
    $transactions = Transaction::all();
    $this->calculateTotals();
    return view('contents.dashboard-home', [
        'Transaction' => $transactions,
        'totalAmount' => $this->totalAmount,
        'totalIncome' => $this->totalIncome,
        'totalExpenses' => $this->totalExpenses
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->calculateTotals();

        return view('contents.add-transaction-page', [
            'totalAmount' => $this->totalAmount,
            'totalIncome' => $this->totalIncome,
            'totalExpenses' => $this->totalExpenses
        ]);
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


        // Redirect ke halaman index
        return redirect()->route('transaction-page');
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
