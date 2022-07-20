<?php

namespace App\Command;

use App\Offer\JsonReader;
use App\Offer\OfferCollection;
use App\Offer\OfferService;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class CountByVendorId extends SymfonyCommand
{

    public function __construct()
    {
        parent::__construct();
    }

    public function configure()
    {
        $this -> setName('count_by_vendor_id')
            -> addArgument('vendorId', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $vendorId = $input->getArgument('vendorId');
        $offerCollection = new OfferCollection();
        $reader = new JsonReader($offerCollection);
        $offerCollection = $reader->fetch();
        $offerService = new OfferService($offerCollection);
        $result = $offerService->countByVendorId($vendorId);
        $output -> writeln("$result");
        return 0;
    }
}