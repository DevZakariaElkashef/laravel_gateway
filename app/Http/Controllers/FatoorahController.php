<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\FatoorahServicesInterface;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    private $fatoorahServices;

    public function __construct(FatoorahServicesInterface $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;
    }

    public function payOrder()
    {
        $data = [
            "CustomerName" => 'Zakaria Elkashef',
            "NotificationOption" => 'LNK',
            "InvoiceValue" => '100',
            "CustomerEmail" => 'dev.zakariaelkashef@gmail.com',
            "CallBackUrl" => env('FATOORAH__SUCCESS_URL'),
            "ErrorUrl" => env('FATOORAH__ERROR_URL'),
            "Language" => 'en',
            "DisplayCurrencyIso" => 'EGP'
        ];

        return $this->fatoorahServices->sendPayment($data);
    }

    public function callBack(Request $request)
    {
        $data['Key'] = $request->paymentId;
        $data['KeyType'] = 'paymentId';

        return $this->fatoorahServices->GetPaymentStatus($data);


    }



    public function errorMessage()
    {
        return 'Something went wrong';
    }
}
