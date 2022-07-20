<?php

use App\Offer\OfferService;

require_once realpath('vendor/autoload.php');

$offerService = new OfferService();
$offerService->printAll();
//echo $offerService->countByPriceRange(12, 250);
//echo "\n";
//echo $offerService->countByVendorId(84);
//echo "\n";