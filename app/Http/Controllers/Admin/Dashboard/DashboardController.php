<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Sum the total_amount for orders created today
        $todaySales = Order::whereDate('created_at', Carbon::today())->sum('total_amount');
        // Sum the total_amount for all orders
        $totalSales = Order::sum('total_amount');
        // Return total orders
        $totalOrders = Order::count();
        // Return total categories
        $totalCategories = Category::count();
        // Return total products
        $totalProducts = Product::count();
        // Recent transactions
        $recentTransactions = OrderPayment::latest()->take(10)->get();
        // Aggregate monthly sales for the current year
        $monthlySalesData = Order::selectRaw("MONTH(created_at) as month, SUM(total_amount) as total")
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

        // Build arrays for all 12 months
        $months = [];
        $sales = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = date("M", mktime(0, 0, 0, $i, 1));
            $sales[]  = $monthlySalesData[$i] ?? 0;
        }

        return view('admin.dashboard.index', compact(
            'todaySales',
            'totalSales',
            'totalOrders',
            'totalCategories',
            'totalProducts',
            'recentTransactions',
            'months',
            'sales'
        ));
    }

    public function contactIndex(){
        $contacts = Contact::all();
        return view('admin.contact-us.index',compact('contacts'));
    }
}
