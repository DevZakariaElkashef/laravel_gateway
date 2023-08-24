<?php

namespace App\Http\Interfaces;

use GuzzleHttp\Client;

interface FatoorahServicesInterface
{
    
    function __construct(Client $requestClient);

    function buildRequest($url, $method, $body = []);

    function sendPayment($data);
    
    function GetPaymentStatus($data);
}