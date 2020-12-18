<?php


namespace App\Domain\Spotify;


interface SpotifyApiInterface
{
    const SPOTIFY_API_URL_BASE      = 'https://api.spotify.com/v1';
    const SPOTIFY_URL_TOKEN         = 'https://accounts.spotify.com/api/token';
    const SPOTIFY_GRANT_TYPE        = 'client_credentials';
    const SPOTIFY_URL_SEARCH        = '/search';
    const TOKEN_BEARER              = 'Bearer ';
    const SPOTIFY_ALBUM_TYPE        = 'album';
    const HTTP_SUCCEED  = 200;

    /**
     * @param $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function search($query);
}