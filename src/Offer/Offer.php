<?php

namespace App\Offer;

class Offer Implements OfferInterface {
    private int $offerId;
    private string $productTitle;
    private int $vendorId;
    private float $price;

    function __construct($data=NULL) {
        if($data != null) {
            if(property_exists($data, 'offerId')) {
                $this->offerId = $data->offerId;
            }
            if(property_exists($data, 'productTitle')) {
                $this->productTitle = $data->productTitle;
            }
            if(property_exists($data, 'vendorId')) {
                $this->vendorId = $data->vendorId;
            }
            if(property_exists($data, 'price')) {
                $this->price = $data->price;
            }
        }
    }

    public function display(): void {
        echo "Offer ID: $this->offerId\n";
        echo "Product: $this->productTitle\n";
        echo "Vendor ID: $this->vendorId\n";
        echo "Price: $this->price\n";
        echo "=========================\n";
    }

    public function checkPriceRange($min, $max): bool {
        return (($min <= $this->price) && ($max >= $this->price));
    }

    public function checkVendorId($vendorId): bool {
        return $this->vendorId == $vendorId;
    }
}