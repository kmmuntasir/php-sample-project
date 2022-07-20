<?php

namespace App\Offer;

class OfferService
{
    private OfferCollection $offerCollection;

    public function __construct(OfferCollection $offerCollection)
    {
        $this->offerCollection = $offerCollection;
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
            $price = $offer->getPrice();
            if(($min <= $price) && ($max >= $price)) {
                ++$count;
            }
        }
        return $count;
    }

    public function countByVendorId($vendorId): int {
        $count = 0;
        foreach($this->offerCollection as $offer) {
            if($vendorId == $offer->getVendorId()) {
                ++$count;
            }
        }
        return $count;
    }
}





