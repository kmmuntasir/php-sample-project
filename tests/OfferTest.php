<?php

use App\Offer\OfferService;
use PHPUnit\Framework\TestCase;

class OfferTest extends  TestCase
{
    /** @test */
    public function reverseMinMaxRangeTest() {
        // given an offer collection
        $offerService = new OfferService();
        // when called the price range method with reversed range
        $result = $offerService->countByPriceRange(50, 40);
        // then we assert the result is zero
        $this->assertEquals(0, $result);
    }
    /** @test */
    public function negativeVendorIdTest() {
        // given an offer collection
        $offerService = new OfferService();
        // when called the vendor Id method with a negative value
        $result = $offerService->countByVendorId(-15);
        // then we assert the result is zero
        $this->assertEquals(0, $result);
    }
}