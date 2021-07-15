<?php
use App\src\SoundCloudRequest;
use \App\src\SounCloudParser;
include("vendor/autoload.php");
//$scr = new SoundCloudRequest();
//echo $scr->getPage("lakeyinspired");
$scp = new SounCloudParser("lakeyinspired");
$scp->parse();