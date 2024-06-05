<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;


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

        $input = $request->all();
        Transaction::create([
            'transaction' => $input['transaction'],
            'amount' => $input['amount'],
            'date' => $input['date'],
        ]);

        return redirect()->route('transaction-page');
    }


    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);

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

    public function generatePDF()
    {
        $Transaction = Transaction::all();


        $html = View::make('contents.transaction-pdf', compact('Transaction'))->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        return $dompdf->stream('transaction.pdf');
    }
}
