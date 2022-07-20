<?php

use App\Offer\JsonReader;
use App\Offer\OfferCollection;
use App\Offer\OfferService;

require_once realpath('vendor/autoload.php');

$offerCollection = new OfferCollection();
$reader = new JsonReader($offerCollection);
$offerCollection = $reader->fetch();
$offerService = new OfferService($offerCollection);
$offerService->printAll();
echo $offerService->countByPriceRange(12, 250);
echo "\n";
echo $offerService->countByVendorId(84);
echo "\n";