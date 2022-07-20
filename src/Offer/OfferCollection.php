<?php

namespace App\Offer;

use IteratorAggregate;
use Iterator;

class OfferCollection Implements OfferCollectionInterface, IteratorAggregate {

    private array $offers = [];

    public function loadData($rawData) {
        foreach($rawData as $offer) {
            $newOffer = new Offer($offer);
            $this->add($newOffer);
        }
    }

    public function add(OfferInterface $offer) {
        $this->offers[] = $offer;
    }
    public function get(int $index): OfferInterface {
        if($index < count($this->offers)) {
            return $this->offers[$index];
        } else {
            return new Offer();
        }
    }
    public function getIterator(): Iterator {
        return new \ArrayIterator($this->offers);
    }
}