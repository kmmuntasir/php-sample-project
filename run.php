#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Command\CountByVendorId;
use Symfony\Component\Console\Application;
use App\Command\CountByPriceRange;

$app = new Application();
$app->add(new CountByPriceRange());
$app->add(new CountByVendorId());
$app -> run();