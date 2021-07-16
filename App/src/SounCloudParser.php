<?php
namespace App\src;

use App\src\entities\Artist;
use App\src\entities\Track;
use SplFileInfo;
use \Symfony\Component\DomCrawler\Crawler;
require_once "bootstrap.php";


class SounCloudParser
{
    private $entityManager;
    private Crawler $crawler;
    public function __construct($artist,$entityManager)
    {
        $this->entityManager = $entityManager;
        $sr = new SoundCloudRequest();
        $this->crawler = new Crawler($sr->getPage($artist . '/tracks'));


    }
    public function parse()
    {

        $artist = new Artist();
        $this->crawler->filter("a")->each(function (Crawler $node,$i) use ($artist)
        {
            if($i == 2) $artist->setName($node->text());
        });
        $this->crawler->filter("p")->each(function (Crawler $node,$i) use ($artist)
        {

            if($i == 3) $artist->setCity($node->text());
        });

        $artist->setCoverPath($this->saveAvatar());
        $this->entityManager->persist($artist);
        $this->entityManager->flush();

        $this->parseTracks($artist);

    }
    public function saveAvatar()
    {
        $filename = $this->crawler->filter("img")->attr("src");
        $picture = $filename;
        $filename = new SplFileInfo($filename);
        $filename = $filename->getFilename();
        $picpath = __DIR__ . "/../../storage/covers/" . $filename;
        file_put_contents($picpath, file_get_contents($picture));
        return $picpath;
    }
    public function parseTracks(Artist $artist)
    {

        $this->crawler->filter("article[class='audible']")->each(function (Crawler $node) use ($artist)
        {
            $track = new Track();
            $track->setArtist($artist);
            $track->setName($node->filter("a")->text());
            $track->setPublicationTime($node->filter("time")->text());
            $track->setDuration($node->filter("meta")->attr("content"));
            $this->entityManager->persist($track);
            $this->entityManager->flush();
        });
    }
}