<?php

use App\src\entities\Artist;
use App\src\SoundCloudRequest;
use \App\src\SounCloudParser;
include("vendor/autoload.php");
require "bootstrap.php";
if(! empty($argv[1])) {
    $scp = new SounCloudParser($argv[1], $entityManager);
    $scp->parse();
}
else
{
    echo "Введите исполнителя \n";
}
