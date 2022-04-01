<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderline;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        return redirect('/');
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
        if($request->pack == "Ramadan"){

        
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

            //line5
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = "500g beurre ";
            $line->save();

            //line6
            $line = new Orderline();
            $line->order_id  = $order->id;
            $line->product  = "1 Pot Fromage Ricotta ";
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

    public function packs(){
        return view("orders.order-stepone");
    }
    public function success($name){

        return view("orders.success-msg",compact('name'));
    }


    public function definePackOne(){
        return view("orders.pack-one");
    }
    public function definePackTwo(){
        return view("orders.pack-two");
    }
    public function definePackThree(){
        return view("orders.pack-three");
    }
    public function definePackFour(){
        return view("orders.pack-four");
    }
    public function finalStep(Request $request){
        if($request->pack == "pack1"){
            $option1 = $request->option1;
            $option2 = $request->option2;
            $pack = "Tot Bag";
            return  view("orders.informations",compact('option1','option2','pack'));
        }
        if($request->pack == "pack2"){
            $option1 = $request->option1;
            $option2 = $request->option2;
            $option3 = $request->option3;
            $pack = "9ouffa";
            return  view("orders.informations",compact('option1','option2','option3','pack'));
        }
        if($request->pack == "pack3"){
            $option1 = $request->option1;
            $option2 = $request->option2;
            $option3 = $request->option3;
            $pack = "Zahra";
            return  view("orders.informations",compact('option1','option2','option3','pack'));
        }
        if($request->pack == "pack4"){
            $option1 = $request->option1;
            $option2 = $request->option2;
            $option3 = $request->option3;
            $pack = "Ramadan";
            return  view("orders.informations-pack-four",compact('option1','option2','option3','pack'));
        }
    }
}
