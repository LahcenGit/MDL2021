<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderline;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $orders = Order::all()->reverse();
        return view('admin.orders',compact('orders'));
    }


    public function store(Request $request){

        if($request->pack =="Tot Bag"){
        
            $order = new Order();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->adress = $request->adress;
            $order->pack = $request->pack;
            $order->wilaya = $request->wilaya;
            $order->statut = 1;
            $order->remarque = $request->remarque;
            $order->total = $request->total;
            $order->save();

            //line1 
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = $request->option1;
            $line->save();

            //line2 
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = $request->option2;
            $line->save();

            //line3
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = "3x boule mozzarella";
            $line->save();

            //line4
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = "Tot Bag";
            $line->save();

            //line3

            if($request->added){
                $line = new Orderline();
                $line->order_id  = $order->id;
                $line->product  = $request->added;
                $line->save();
            }

        }


        if($request->pack =="9ouffa"){

        
            $order = new Order();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->adress = $request->adress;
            $order->pack = $request->pack;
            $order->wilaya = $request->wilaya;
            $order->statut = 1;
            $order->remarque = $request->remarque;
            $order->total = $request->total;
            $order->save();

            //line1 
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = $request->option1;
            $line->save();

            //line2 
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = $request->option2;
            $line->save();

            //line3
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  =  $request->option3;
            $line->save();

            //line4
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = "9ouffa";
            $line->save();

            //line3

            if($request->added){
                $line = new Orderline();
                $line->order_id  = $order->id;
                $line->product  = $request->added;
                $line->save();
            }

        }

        if($request->pack == "Zahra"){

        
            $order = new Order();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->adress = $request->adress;
            $order->pack = $request->pack;
            $order->wilaya = $request->wilaya;
            $order->statut = 1;
            $order->remarque = $request->remarque;
            $order->total = $request->total;
            $order->save();

            //line1 
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = $request->option1;
            $line->save();

            //line2 
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = $request->option2;
            $line->save();

            //line3
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  =  $request->option3;
            $line->save();

            //line4
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = "1 Boule Mozzarella";
            $line->save();

            //line3

            if($request->added){
                $line = new Orderline();
                $line->order_id  = $order->id;
                $line->product  = $request->added;
                $line->save();
            }

        }
        $name =  $request->name;

        return redirect('orders/success/' . $name);
    }


    public function orderDetail($id){

        $order = Order::find($id);
        return view('orders.order-detail',compact('order'));

    }

    public function orderTicket($id){

        $order = Order::find($id);
        return view('orders.order-ticket',compact('order'));

    }


    public function orderApprouve($id){

        $order = Order::find($id);
        $order->statut = 2 ; 
        $order->save();
        return redirect('/dashboard-admin/orders');

    }
    public function orderCancel($id){

        $order = Order::find($id);
        $order->statut = 3 ; 
        $order->save();
        return redirect('/dashboard-admin/orders');

    }
}
