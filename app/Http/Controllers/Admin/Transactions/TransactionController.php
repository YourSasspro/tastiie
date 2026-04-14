<?php

namespace App\Http\Controllers\Admin\Transactions;

use App\Http\Controllers\Controller;
use App\Models\OrderPayment;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = OrderPayment::all();
        return view('admin.transactions.index',compact('transactions'));
    }
}
