<?php
declare(strict_types=1);

namespace App\Domain\Album\Service;

use App\Domain\Album\Album;
use App\Domain\Album\Cover;
use App\Domain\Spotify\SpotifyApi;
use App\Domain\Spotify\SpotifyApiInterface;

class SpotifyAlbumService
{
    /**
     * @var SpotifyApiInterface
     */
    protected $spotifyApi;

    /**
     * SpotifyAlbumService constructor.
     * @param SpotifyApiInterface $spotifyApi
     */
    public function __construct(SpotifyApiInterface $spotifyApi)
    {
        $this->spotifyApi = $spotifyApi;
    }

    /**
     * @param $query
     * @return array|null
     */
    public function search($query) : array
    {
        $response = $this->spotifyApi->search($query);
        $albums = [];

        if($response && isset($response->items)){
            foreach ($response->items as $item){
                $firstImage = array_shift($item->images);
                $cover = ($firstImage) ? new Cover($firstImage->height, $firstImage->width, $firstImage->url) : $firstImage;

                $album = new Album(
                    $item->name,
                    $this->formatStringDate($item->release_date),
                    $item->total_tracks,
                    $cover
                );

                array_push($albums, $album);
            }
        }

        return $albums;
    }

    /**
     * @param string $date
     * @return string
     */
    private function formatStringDate(string $date) : string
    {
        return date('d-m-Y', strtotime($date));
    }
}