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

    /**
     * @return int
     */
    public function getOfferId(): int
    {
        return $this->offerId;
    }

    /**
     * @param int $offerId
     */
    public function setOfferId(int $offerId): void
    {
        $this->offerId = $offerId;
    }

    /**
     * @return string
     */
    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    /**
     * @param string $productTitle
     */
    public function setProductTitle(string $productTitle): void
    {
        $this->productTitle = $productTitle;
    }

    /**
     * @return int
     */
    public function getVendorId(): int
    {
        return $this->vendorId;
    }

    /**
     * @param int $vendorId
     */
    public function setVendorId(int $vendorId): void
    {
        $this->vendorId = $vendorId;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function display(): void {
        echo "Offer ID: $this->offerId\n";
        echo "Product: $this->productTitle\n";
        echo "Vendor ID: $this->vendorId\n";
        echo "Price: $this->price\n";
        echo "=========================\n";
    }
}