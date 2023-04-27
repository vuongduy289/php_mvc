<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Order;

class OrderController extends BaseController {
    public function index() 
    {
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            $orders = Order::get();
        }else{
            $orders = Order::where('name', 'like', "%keyword%")->get();
        }

        $count = Order::count();
        
        return $this->render('order.index', compact('orders', 'keyword', 'count'));
    }

    public function create() 
    {
        return $this->render('order.create', []);
    }

    public function store() 
    {
        $order = new Order();
        $order->user_id = $_POST['user_id'];
        $order->date = $_POST['date'];
        $order->status = $_POST['status'];
        $order->save();

        $url = BASE_URL . 'orders';
        header("location: $url");
    }

    public function show($id) 
    {
        $order = Order::find($id);

        return $this->render('order.detail', compact('order'));
    }

    public function edit($id) 
    {
        $order = Order::find($id);

        return $this->render('order.edit', compact('order'));
    }

    public function update($id) 
    {
        $order = Order::find($id);
        $order->user_id = $_POST['user_id'];
        $order->date = $_POST['date'];
        $order->status = $_POST['status'];
        $order->save();

        $url = BASE_URL. 'orders';
        header("location: $url");
    }

    public function destroy($id) 
    {
        $order = Order::find($id);
        $order->delete();

        $url = BASE_URL. 'orders';
        header("location: $url");
    }
}
