<?php

namespace App\Http\Controllers\commercial;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Produit;
use App\Models\Professionalorder;
use App\Models\Professionalorderline;
use App\Models\Professionnel;
use App\Models\Tarification;
use App\Models\User;
use App\Models\Wilaya;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommercialController extends Controller
{
    //

    public function index(){
        $orders = Professionalorder::where('commercial_id','!=',NULL)->orderBy('created_at','desc')->limit(10)->get();
        $order_en_attente = Professionalorder::where('status',1)->count();
        $order_valide = Professionalorder::where('status',2)->count();
        $order_livraison = Professionalorder::where('status',3)->count();
        $order_livre= Professionalorder::where('status',4)->count();
        $order_annuler= Professionalorder::where('status',5)->count();

        $revenu_pro = Professionalorder::where('status',4)->where('commercial_id','!=',NULL)->sum('total');
        $revenu_pro_adv = Professionalorder::where('status',4)->where('commercial_id',NULL)->sum('total');

        return view('commercial.dashboard-commercial',compact('orders','order_en_attente','order_valide','order_annuler','order_livre','order_livraison','revenu_pro'));
    }
    public function createProfessional(){
        $wilayas = Wilaya::all();
        return view('commercial.add-professional',compact('wilayas'));
    }
    //professionals parcours
    public function storeProfessional(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->type = 'professional';
        $user->save();
        $professional = new Professionnel();
        $professional->user_id = $user->id;
        $professional->commercial_id = Auth::user()->id;
        $professional->phone = $request->phone;
        $professional->wilaya = $request->wilaya;
        $professional->type = $request->type;
        $professional->latitude = $request->latitude;
        $professional->longitude = $request->longitude;
        $professional->save();
        $cart = new Cart();
        $cart->professional_id = $professional->id;
        $cart->save();
        return redirect('/commercial/professionals');
    }
    public function professionals(){
        $professionals = Professionnel::where('commercial_id','!=',NULL)->orderBy('created_at','desc')->get();
        return view('commercial.professionals',compact('professionals'));
    }

    //order parcours
    public function createOrder(){
        $professionals = Professionnel::orderBy('created_at','desc')->get();
        $wilayas = Wilaya::all();
        $products = Produit::orderBy('flag','asc')->get();
        return view('commercial.add-order',compact('professionals','wilayas','products'));
    }

    public function storeOrder(Request $request){

          $professional = Professionnel::find($request->professional);

           $total = 0;
           $sub_total = null;
           $tva = null;
           $date = Carbon::now()->format('y');
           $order = new Professionalorder();
           $order->professional_id = $professional->id;
           $order->commercial_id = Auth::user()->id;
           $order->status = 1;
           $order->save();
           if($request->check_pack == 1){
            //mozza boule
            $orderline = new Professionalorderline();
            $orderline->professionalorder_id = $order->id;
            $orderline->qte = 10;
            $orderline->product_id = 12;
            $orderline->pu = 145;
            $orderline->total = 1450;
            $orderline->save();
            //feta huile FH
            $orderline = new Professionalorderline();
            $orderline->professionalorder_id = $order->id;
            $orderline->qte = 5;
            $orderline->product_id = 1;
            $orderline->pu = 220;
            $orderline->total = 2200;
            $orderline->save();
            //feta huile PIM
            $orderline = new Professionalorderline();
            $orderline->professionalorder_id = $order->id;
            $orderline->qte = 5;
            $orderline->product_id = 3;
            $orderline->pu = 220;
            $orderline->total = 2200;
            $orderline->save();
            //mozza 500 G
            $orderline = new Professionalorderline();
            $orderline->professionalorder_id = $order->id;
            $orderline->qte = 10;
            $orderline->product_id = 7;
            $orderline->pu = 670;
            $orderline->total = 6700;
            $orderline->save();
        }
        else{
           for($i=0 ; $i<count($request->products); $i++ ){
            $orderline = new Professionalorderline();
            $orderline->professionalorder_id = $order->id;
            $orderline->qte = $request->qtes[$i];
            $orderline->product_id = $request->products[$i];
            if($professional->type == 'Pizzeria'){

             $tarification = Tarification::where('type','Pizzeria')->where('product_id',$request->products[$i])->first();
             if($request->qtes[$i] < 100){
                $orderline->total = $request->qtes[$i] * $tarification->price_one;
                $orderline->pu = $tarification->price_one;
                $total = $total +  $request->qtes[$i] * $tarification->price_one;
             }
             else{
                $orderline->total = $request->qtes[$i] * $tarification->price_two;
                $orderline->pu = $tarification->price_two;
                $total = $total +  $request->qtes[$i] * $tarification->price_two;
             }
            /* if($tarification->price_two == Null && $tarification->price_tree == NULL ){
                $orderline->total = $request->qtes[$i] * $tarification->price_one;
                $orderline->pu = $tarification->price_one;
                $total = $total +  $request->qtes[$i] * $tarification->price_one;


               }
             else if($tarification->price_one != NULL && $tarification->price_two != NULL){

               if($request->qtes[$i] <= 100){
                   $orderline->total = $request->qtes[$i] * $tarification->price_one;
                   $orderline->pu = $tarification->price_one;
                   $total = $total + $request->qtes[$i] * $tarification->price_one;

               }
               else {
                   $orderline->total = $request->qtes[$i] * $tarification->price_two;
                   $orderline->pu = $tarification->price_two;
                   $total = $total + $request->qtes[$i] * $tarification->price_two;

               }
           }*/

         }
            else if($professional->type == 'Grossiste'){
               $tarification = Tarification::where('type','Grossiste')->where('product_id',$request->products[$i])->first();
               if($request->qtes[$i] < 100){
                $orderline->total = $request->qtes[$i] * $tarification->price_one;
                $orderline->pu = $tarification->price_one;
                $total = $total +  $request->qtes[$i] * $tarification->price_one;
             }
             else{
                $orderline->total = $request->qtes[$i] * $tarification->price_two;
                $orderline->pu = $tarification->price_two;
                $total = $total +  $request->qtes[$i] * $tarification->price_two;
             }
               /*
               if($tarification->price_two == Null && $tarification->price_tree == NULL ){
                   $orderline->total = $request->qtes[$i] * $tarification->price_one;
                   $orderline->pu = $tarification->price_one;
                   $total = $total +  $request->qtes[$i] * $tarification->price_one;

               }
               else if($tarification->price_one != NULL && $tarification->price_two != NULL){
                  if($request->qtes[$i] >= 100){
                        $orderline->total = $request->qtes[$i] * $tarification->price_one;
                        $orderline->pu = $tarification->price_one;
                        $total = $total + $request->qtes[$i] * $tarification->price_one;

                   }
                   else if($request->qtes[$i] > 300) {
                       $orderline->total = $request->qte[$i] * $tarification->price_two;
                       $orderline->pu = $tarification->price_two;
                       $total = $total + $request->qte[$i] * $tarification->price_two;

                   }
                   else if($request->qtes[$i] < 100){
                       $orderline->total = $request->qte[$i] * 1400;
                       $orderline->pu = 1400;
                       $total = $total + $request->qte[$i] * 1400;
                   }

            }
            */
           }
           else if($professional->type == 'Superette'){
                    $tarification = Tarification::where('type','Superette')->where('product_id',$request->products[$i])->first();
                    $orderline->total = $request->qtes[$i] * $tarification->price_one;
                    $orderline->pu = $tarification->price_one;
                    $total = $total +  $request->qtes[$i] * $tarification->price_one;
        }
            else{
              $tarification = Tarification::where('type','Orika')->where('product_id',$request->products[$i])->first();
              $orderline->total = $request->qtes[$i] * $tarification->price_one;
              $orderline->pu = $tarification->price_one;
              $total =  $total + $request->qtes[$i] * $tarification->price_one;

            }
            $orderline->save();
           }
        }
           if($professional->type == 'Orika'){
               $tva = ($total*19)/100;
               $sub_total = $total;
               $total = $total + $tva;
           }
           $total_order = Professionalorderline::where('professionalorder_id',$order->id)->sum('total');
           $order->total = $total_order;
           $order->code = 'mdl'.'-'.$date.'-'.$order->id;
           $order->save();


        return redirect('commercial/order-professionals');
    }
    public function orders(){
    $orders = Professionalorder::where('commercial_id','!=', NULL)->orderBy('created_at','desc')->get();
     return view('commercial.orders',compact('orders'));
    }

    public function editOrder($id){
        $order = Professionalorder::find($id);
        $professionals = Professionnel::all();
        $orderlines = Professionalorderline::where('professionalorder_id',$id)->get();
        $array = array();
        foreach($orderlines as $orderline){
            array_push($array , $orderline->product_id);
        }
        $products = Produit::whereNotIn('id',$array)->orderBy('flag','asc')->get();
        return view('commercial.edit-order-professional',compact('order','professionals','products','orderlines'));
    }

    public function getType($id){
     $professional = Professionnel::find($id);
     return $professional;
    }

    public function showModal($id){
        $order = Professionalorder::find($id);
        $orderlines = Professionalorderline::where('professionalorder_id',$id)->get();
        $total = $orderlines->sum('total');
        return view('commercial.modal-order-lines',compact('orderlines','total','order'));
    }

    public function editProfessional($id){
        $professional = Professionnel::find($id);
        $wilayas = Wilaya::all();
        return view('commercial.edit-professional',compact('professional','wilayas'));
    }

    public function updateProfessional(Request $request , $id){
        $professional = Professionnel::find($id);
        $user = User::where('id',$professional->user_id)->first();
        $user->name = $request->name;
        $user->type = 'professionnel';
        $user->save();
        $professional->phone = $request->phone;
        $professional->wilaya = $request->wilaya;
        $professional->type = $request->type;
        $professional->latitude = $request->latitude;
        $professional->longitude = $request->longitude;
        $professional->save();
        return redirect('/commercial/professionals');
    }

    public function updateOrder(Request $request , $id){
        $total = 0;
        $sub_total = null;
        $tva = null;
        $date = Carbon::now()->format('y');
        $order = Professionalorder::find($id);
        $orderlines = Professionalorderline::where('professionalorder_id',$id)->get();
        foreach($orderlines as $orderline){
            $orderline->delete();
        }
        if($request->products_order){
            for($i=0 ; $i<count($request->products_order); $i++ ){
                $orderline = new Professionalorderline();
                $orderline->professionalorder_id = $order->id;
                $orderline->qte = $request->qtes_order[$i];
                $orderline->product_id = $request->products_order[$i];
                if($order->professional->type == 'Pizzeria'){

                $tarification = Tarification::where('type','Pizzeria')->where('product_id',$request->products_order[$i])->first();
                if($request->qtes[$i] < 100){
                    $orderline->total = $request->qtes[$i] * $tarification->price_one;
                    $orderline->pu = $tarification->price_one;
                    $total = $total +  $request->qtes[$i] * $tarification->price_one;
                 }
                 else{
                    $orderline->total = $request->qtes[$i] * $tarification->price_two;
                    $orderline->pu = $tarification->price_two;
                    $total = $total +  $request->qtes[$i] * $tarification->price_two;
                 }

            }
                else if($order->professional->type == 'Grossiste'){
                    $tarification = Tarification::where('type','Grossiste')->where('product_id',$request->products_order[$i])->first();
                    if($request->qtes[$i] < 100){
                        $orderline->total = $request->qtes[$i] * $tarification->price_one;
                        $orderline->pu = $tarification->price_one;
                        $total = $total +  $request->qtes[$i] * $tarification->price_one;
                     }
                     else{
                        $orderline->total = $request->qtes[$i] * $tarification->price_two;
                        $orderline->pu = $tarification->price_two;
                        $total = $total +  $request->qtes[$i] * $tarification->price_two;
                     }
                }
                else if($order->professional->type == 'Superette'){
                    $tarification = Tarification::where('type','Superette')->where('product_id',$request->products_order[$i])->first();
                    $orderline->total = $request->qtes_order[$i] * $tarification->price_one;
                    $orderline->pu = $tarification->price_one;
                    $total = $total +  $request->qtes_order[$i] * $tarification->price_one;
                }
                else{
                $tarification = Tarification::where('type','Orika')->where('product_id',$request->products_order[$i])->first();
                $orderline->total = $request->qtes_order[$i] * $tarification->price_one;
                $orderline->pu = $tarification->price_one;
                $total =  $total + $request->qtes_order[$i] * $tarification->price_one;

                }
                $orderline->save();
                }

            if($order->professional->type == 'Orika'){

                $tva = ($total*19)/100;
                $sub_total = $total;
                $total = $total + $tva;
            }
            $total_order = Professionalorderline::where('professionalorder_id',$order->id)->sum('total');
            $order->total = $total_order;
            $order->save();

        }
        if($request->products){
            for($i=0 ; $i<count($request->products); $i++ ){
                $orderline = new Professionalorderline();
                $orderline->professionalorder_id = $order->id;
                $orderline->qte = $request->qtes[$i];
                $orderline->product_id = $request->products[$i];
                if($order->professional->type == 'Pizzeria'){

                $tarification = Tarification::where('type','Pizzeria')->where('product_id',$request->products[$i])->first();
                if($request->qtes[$i] < 100){
                    $orderline->total = $request->qtes[$i] * $tarification->price_one;
                    $orderline->pu = $tarification->price_one;
                    $total = $total +  $request->qtes[$i] * $tarification->price_one;
                 }
                 else{
                    $orderline->total = $request->qtes[$i] * $tarification->price_two;
                    $orderline->pu = $tarification->price_two;
                    $total = $total +  $request->qtes[$i] * $tarification->price_two;
                 }
            }
                else if($order->professional->type == 'Grossiste'){
                    $tarification = Tarification::where('type','Grossiste')->where('product_id',$request->products[$i])->first();
                    if($request->qtes[$i] < 100){
                        $orderline->total = $request->qtes[$i] * $tarification->price_one;
                        $orderline->pu = $tarification->price_one;
                        $total = $total +  $request->qtes[$i] * $tarification->price_one;
                     }
                     else{
                        $orderline->total = $request->qtes[$i] * $tarification->price_two;
                        $orderline->pu = $tarification->price_two;
                        $total = $total +  $request->qtes[$i] * $tarification->price_two;
                     }
                }
                else if($order->professional->type == 'Superette'){
                    $tarification = Tarification::where('type','Superette')->where('product_id',$request->products[$i])->first();
                    $orderline->total = $request->qtes[$i] * $tarification->price_one;
                    $orderline->pu = $tarification->price_one;
                    $total = $total +  $request->qtes[$i] * $tarification->price_one;
                }
                else{
                $tarification = Tarification::where('type','Orika')->where('product_id',$request->products[$i])->first();
                $orderline->total = $request->qtes[$i] * $tarification->price_one;
                $orderline->pu = $tarification->price_one;
                $total =  $total + $request->qtes[$i] * $tarification->price_one;

                }
                $orderline->save();
                }

            if($order->professional->type == 'Orika'){

                $tva = ($total*19)/100;
                $sub_total = $total;
                $total = $total + $tva;
            }
            $total_order = Professionalorderline::where('professionalorder_id',$order->id)->sum('total');
            $order->total = $total_order;
            $order->save();
        }
        return redirect('commercial/order-professionals');
    }
    public function orderDetailProfessional($id){
        $order = Professionalorder::find($id);
        $orderlines = Professionalorderline::where('professionalorder_id',$id)->get();
        return view('commercial.order-professional-detail',compact('order','orderlines'));

    }


    public function obtenirItineraire($latitudeArrivee, $longitudeArrivee)
        {
            $url = 'https://www.google.com/maps/dir//' . $latitudeArrivee . ',' . $longitudeArrivee;

            return redirect()->away($url);
        }

    public function editStatus($id){
      $order = Professionalorder::find($id);
      return view('commercial.modal-edit-status',compact('order'));
    }

    public function updateStatus(Request $request){
        $order = Professionalorder::find($request->order);
        $order->status = $request->status;
        $order->save();
        return true;
    }

}
