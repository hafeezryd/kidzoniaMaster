<?php

namespace App\Http\Controllers\parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay; 

class CcavenueController extends Controller
{
    //
    public function ccavenuePayment($studentId,$paynow){
       
       $studentInfo = \App\Student::find($studentId);
       $payment = new \App\Payment_request;

       $payment->student_id = $studentId;
       $payment->amount = $paynow;
       $payment->save();
       $paymentRequestId = $payment->id;
    //    return  $studentInfo . '-'. $paynow;
       $parameters = [             
            'order_id' => $paymentRequestId,
            'amount'=> $paynow,
            'billing_name' =>$studentInfo->first_name,
            'billing_address' => '' ,
            'billing_city'      => 'Hyderabad', 
            'billing_state'     => 'Telangana',
            'billing_zip'       => '00',
            'billing_country'   => 'India',
            'billing_tel'       => $studentInfo->mobile_father,
            'billing_email'     => $studentInfo->email_father,
                            ];
        //return $parameters;
          $order = Indipay::prepare($parameters);
          return Indipay::process($order);

    }
    
    public function ccavenuePaymentResponse(Request $request){
        $response = Indipay::response($request);
        dd($response);
        // return $response;
    }
}
