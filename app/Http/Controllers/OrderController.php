<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\OrderStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $orders = Order::with('product')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $products = Product::query()
        ->orderBy('created_at', 'desc')
        ->get();
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'product' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string|max:255',
            'created_at' => 'required|date',
            'status' => [new Enum(OrderStatus::class)],
            'comment' => 'string|nullable',
        ]);
        $validatedData['product_id'] = $validatedData['product'];
        unset($validatedData['product']);
        $order = new Order();
        $order->fill($validatedData);
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Заказ создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): View
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        if($request->input('status') === OrderStatus::CompletedOrderStatus->value){
            $order->update(['status' => OrderStatus::CompletedOrderStatus->value]);
        }
        return redirect()->route('orders.show', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
