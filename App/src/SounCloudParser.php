<?php
namespace App\src;

use App\src\entities\Artist;
use \Symfony\Component\DomCrawler\Crawler;
require_once "bootstrap.php";

class SounCloudParser
{
    private Crawler $crawler;
    public function __construct($artist)
    {
        $sr = new SoundCloudRequest();
        $this->crawler = new Crawler($sr->getPage($artist));
    }


    public function parse()
    {
        $artist = new Artist();
//        $entityManager->persist($artist);
//        $entityManager->flush();
        $artist->setName("");



    }

}