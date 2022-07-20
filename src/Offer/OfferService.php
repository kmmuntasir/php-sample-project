<?php

namespace App\Offer;

const JSON_ENDPOINT = "sample.json";

class OfferService
{
    private OfferCollection $offerCollection;

    public function __construct() {
        $this->offerCollection = $this->fetchData();
    }

    public function fetchData(): OfferCollectionInterface
    {
        $jsonString = file_get_contents(JSON_ENDPOINT);
        $offerCollection = new OfferCollection();
        $reader = new JsonReader($offerCollection);
        return  $reader->read($jsonString);
    }

    // Just for the sake of easy debugging
    public function printAll(): void
    {
        foreach ($this->offerCollection as $offer) {
            $offer->display();
        }
    }

    public function countByPriceRange($min, $max): int {
        $count = 0;
        foreach($this->offerCollection as $offer) {
            if($offer->checkPriceRange($min, $max)) {
                ++$count;
            }
        }
        return $count;
    }

    public function countByVendorId($vendorId): int {
        $count = 0;
        foreach($this->offerCollection as $offer) {
            if($offer->checkVendorId($vendorId)) {
                ++$count;
            }
        }
        return $count;
    }
}





