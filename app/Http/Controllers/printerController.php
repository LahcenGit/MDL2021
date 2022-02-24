<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
use App\Models\Setting;
use Carbon\Carbon;
use Exception;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector  as WindowsPrintConnector;
use NunoMaduro\Collision\Adapters\Phpunit\Printer as PhpunitPrinter;

class printerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function achats(){

        $achats = Achat::with('vendeur','analyse')
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();
        $countachat = Achat::whereMonth('created_at', Carbon::now()->month)
                        ->count();
        $date =  Carbon::now()->month()->format('M');         
        return view('milkcheck.print-achat',compact('achats','countachat','date'));
    }


    public function vendeurs(){

        $vendeurs = Achat::with('vendeur')
                          ->selectRaw('sum(qte) as qte')
                          ->selectRaw('vendeur_id')
                          ->groupBy('vendeur_id')
                          ->whereMonth('created_at', Carbon::now()->month)
                          ->get();

                  
        return view('milkcheck.print-vendeur',compact('vendeurs'));
    }

    public function ticketPos($id){


            $achat = Achat::find($id);

            $printer_ticket = Setting::where('type','milkcheck')->where('name','Printer')->first();
            $img = Setting::where('type','milkcheck')->where('name','Image')->first();

            try{


            $connector = new WindowsPrintConnector($printer_ticket->value1);
            $printer = new Printer($connector);

            $justification = Printer::JUSTIFY_CENTER;
            $justification2 = Printer::JUSTIFY_LEFT;
            $underline = Printer::UNDERLINE_DOUBLE;

            $img = EscposImage::load( $img->value1);
            $printer -> setJustification($justification);
            $printer -> graphics($img);
        
            $printer -> setJustification($justification);
         
            $printer -> feed();
            $printer -> setEmphasis(true);
            $printer -> text('Collecteur :'. $achat->collector->name);
            $printer -> feed();
            $printer -> text('date :'. Carbon::today()->format('d-m-Y')."\n");
            $printer -> feed();

            $printer -> setUnderline($underline);
            $line_t = sprintf('%-5.40s %5.3s %13.3s %13.5s','Eleveur', 'Qte', 'P.U', 'Total');
            $printer->text($line_t);
            $printer -> feed();
            $printer -> setUnderline($underline);
            foreach($achat->lineachats as $line){
                $line_t = sprintf('%-5.40s %5.0f %13.2f %13.2f',$line->breeder->name, $line->qte, $line->price, $line->total);
                $printer->text($line_t);
                $printer->text("\n"); 
            }
            $printer -> feed();
            $printer -> initialize();
            $printer -> setTextSize(1, 1);
            $printer -> text('Qte :'. $achat->qte . 'L');
            $printer -> feed();
            $printer -> text('Total :'. number_format($achat->total, 2) . 'Da');
            $printer -> feed(2);

            $printer -> initialize();
            $printer -> text("Merci !\n");
            $printer -> feed(3);
            $printer -> cut();
            $printer -> close();

        } catch (Exception $e) {
            echo "Impossible d'imprimer: " . $e -> getMessage() . "\n";
        }
    }


    public function receipt($id){


        return view('milkcheck.receipt');

    }
}
