<?php
namespace App\src;
class SoundCloudRequest
{
    const base_url = "https://soundcloud.com/";
    public function getPage($artist)
    {
        $ch = curl_init(self::base_url . $artist);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}