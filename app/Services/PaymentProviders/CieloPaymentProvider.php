<?php

namespace App\Services\PaymentProviders;

use App\Services\Utils\Http;
use App\Services\PaymentProviders\Interfaces\PaymentProviderContract;

class CieloPaymentProvider implements PaymentProviderContract
{
    public function __construct(Http $clientHttp)
    {}

    public function charge(string $email, int $amount): string
    {
        return "We successfully charged BR {$amount} from {$email}";
    }
}
