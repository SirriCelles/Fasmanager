<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function makeMomoPayment(){
            return view("paymentForm");
    }

    public function processMomoPayment(Request $request){
        $data = $request->all();
        $email = "sirricelles@gmail.com";
        try{
            $cleint = new Client([
                'base_uri' => 'https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml',
                'verify' => false,
            ]);
    
            $response = $cleint->request('GET', '', [
                'query' => [
                    'idbouton' => 2,
                    'typebouton' => 'PAIE',
                    '_amount' => $data['amount'],
                    '_tel' => $data['phone'],
                    '_clP' => '',
                    '_email' => "sirricelles@gmail.com",
                ]
            ]);
            dd($response->getBody()->getContents());

        }catch(RequestException $ex){
            dd($ex);
        }
        // dd($data);

    /*    
    <form id="formmomo" method="GET" action="https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml" target="_top">
        <input type="hidden" name="idbouton" value="2" autocomplete="off">
        <input type="hidden" name="typebouton" value="PAIE" autocomplete="off">
        <input class="momo mount" type="hidden" placeholder="" name="_amount" value="0" id="montant" autocomplete="off">
            <input class="momo host" type="hidden" placeholder="" name="_tel" value="670756565" autocomplete="off">
            <input class="momo pwd" placeholder="Please enter your password" name="_clP" value="" autocomplete="off" type="hidden">
        <input type="hidden" name="_email" value="sirricelles@gmail.com" autocomplete="off">
            <input type="image" id="Button_Image" src="https://developer.mtn.cm/OnlineMomoWeb/console/uses/itg_img/buttons/MOMO_buy_now_EN.jpg" style="width : 250px; height: 100px;" name="submit" alt="OnloneMomo, le réflexe sécurité pour payer en ligne" autocomplete="off" border="0">      
        </form>
     */    
            
    }
}
