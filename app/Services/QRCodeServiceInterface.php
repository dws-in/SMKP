<?php

namespace App\Services;
use SimpleSoftwareIO\QrCode;

Interface QRCodeServiceInterface 
{
    public function generate($data);
}
