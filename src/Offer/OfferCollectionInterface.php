<?php

namespace App\Offer;

use Iterator;

/**
 * Interface for The Collection class that contains Offers
 */
interface OfferCollectionInterface
{
    public function loadData($rawData);
    public function add(OfferInterface $offer);
    public function get(int $index): OfferInterface;
    public function getIterator(): Iterator;
}