<?php

namespace App\Offer;

class JsonReader Implements ReaderInterface {
    private OfferCollectionInterface $offerCollectionInterface;

    public function __construct(OfferCollectionInterface $offerCollectionInterface) {
        $this->offerCollectionInterface = $offerCollectionInterface;
    }

    /**
     * @throws \Exception
     */
    public function read(string $input): OfferCollectionInterface {
        $jsonData = json_decode($input);
        if($jsonData == NULL) {
            throw new \Exception('Error Parsing JSON Data');
        }
        $this->offerCollectionInterface->loadData($jsonData);
        return $this->offerCollectionInterface;
    }
}