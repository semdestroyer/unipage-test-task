<?php
namespace App\src\entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_tracks")
 */

class Track
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @return mixed
     */
    public function getPublicationTime()
    {
        return $this->publication_time;
    }

    /**
     * @param mixed $publication_time
     */
    public function setPublicationTime($publication_time): void
    {
        $this->publication_time = $publication_time;
    }

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\src\entities\Artist", inversedBy="track")
     */
    private $artist;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $duration;

    /**
     * @ORM\Column(type="string")
     */
    private $publication_time;



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getArtist(): Artist
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist(Artist $artist): void
    {
        $this->artist = $artist;
    }
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(type="string")
     * @var string
     */




}