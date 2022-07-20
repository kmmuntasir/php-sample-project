<?php

use App\Offer\JsonReader;
use App\Offer\OfferCollection;
use App\Offer\OfferService;
use PHPUnit\Framework\TestCase;

class OfferServiceTest extends  TestCase
{
    /** @test */
    public function reverseMinMaxRangeTest() {
        // given an offer collection
        $offerCollection = new OfferCollection();
        $reader = new JsonReader($offerCollection);
        $offerCollection = $reader->fetch();
        $offerService = new OfferService($offerCollection);
        // when called the price range method with reversed range
        $result = $offerService->countByPriceRange(50, 40);
        // then we assert the result is zero
        $this->assertEquals(0, $result);
    }
    /** @test */
    public function negativeVendorIdTest() {
        // given an offer collection
        $offerCollection = new OfferCollection();
        $reader = new JsonReader($offerCollection);
        $offerCollection = $reader->fetch();
        $offerService = new OfferService($offerCollection);
        // when called the vendor Id method with a negative value
        $result = $offerService->countByVendorId(-15);
        // then we assert the result is zero
        $this->assertEquals(0, $result);
    }
}