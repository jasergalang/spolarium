<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Artist;
use App\Models\Customer;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        // Fetch data for customers
        $customers = Customer::all();
        $customerData = [
            'labels' => [],
            'data' => []
        ];
        foreach ($customers as $customer) {
            $customerData['labels'][] = $customer->fname . ' ' . $customer->lname;
            $customerData['data'][] = $customer->order()->count(); // Assuming you have a relationship set up
        }

        // Fetch data for artists
        $artists = Artist::all();
        $artistData = [
            'labels' => [],
            'data' => []
        ];
        foreach ($artists as $artist) {
            $artistData['labels'][] = $artist->fname . ' ' . $artist->lname;
            $artistData['data'][] = $artist->artwork()->count(); // Assuming you have a relationship set up
        }

        // Fetch data for orders
        $orders = Order::all();
        $orderData = [
            'labels' => [],
            'data' => []
        ];
        foreach ($orders as $order) {
            $orderData['labels'][] = $order->created_at->format('M Y');
            $orderData['data'][] = 1; // Assuming each order counts as one, you can change this according to your requirements
        }

        // Pass the data to the view
        return view('chart', compact('customerData', 'artistData', 'orderData'));
    }
}
