<?php

namespace App\Command;

use App\Offer\JsonReader;
use App\Offer\OfferCollection;
use App\Offer\OfferService;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class CountByPriceRange extends SymfonyCommand
{

    public function __construct()
    {
        parent::__construct();
    }

    public function configure()
    {
        $this -> setName('count_by_price_range')
            -> addArgument('min', InputArgument::REQUIRED)
            -> addArgument('max', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $min = $input->getArgument('min');
        $max = $input->getArgument('max');
        $offerCollection = new OfferCollection();
        $reader = new JsonReader($offerCollection);
        $offerCollection = $reader->fetch();
        $offerService = new OfferService($offerCollection);
        $result = $offerService->countByPriceRange($min, $max);
        $output -> writeln("$result");
        return 0;
    }
}