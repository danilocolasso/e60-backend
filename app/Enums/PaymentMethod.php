<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CASH = 'cash';
    case CARD = 'card';
    case DEPOSIT = 'deposit';
    case BILLED = 'billed';
    case BOLETO = 'boleto';
    case COURTESY = 'courtesy';
    case PAGSEGURO = 'pagseguro';
    case PAYPAL = 'paypal';
    case PIX = 'pix';
}
