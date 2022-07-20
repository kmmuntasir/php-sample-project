<?php

namespace App\Offer;

class JsonReader Implements ReaderInterface {
    const JSON_ENDPOINT = "sample.json";
    private OfferCollectionInterface $offerCollectionInterface;

    public function __construct(OfferCollectionInterface $offerCollectionInterface) {
        $this->offerCollectionInterface = $offerCollectionInterface;
    }

    public function fetch(): OfferCollectionInterface
    {
        $jsonString = file_get_contents($this::JSON_ENDPOINT);
        return $this->read($jsonString);
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