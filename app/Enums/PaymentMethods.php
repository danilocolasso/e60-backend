<?php

namespace App\Enums;

enum PaymentMethods: string
{
    const CASH = 'cash';
    const CARD = 'card';
    const DEPOSIT = 'deposit';
    const BILLED = 'billed';
    const BOLETO = 'boleto';
    const COURTESY = 'courtesy';
    const PAGSEGURO = 'pagseguro';
    const PAYPAL = 'paypal';
    const PIX = 'pix';
}
