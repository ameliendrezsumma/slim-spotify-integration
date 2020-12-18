<?php
declare(strict_types=1);

namespace App\Application\Actions\Album;

use Psr\Http\Message\ResponseInterface as Response;

class ListAlbumAction extends AlbumAction
{
    const NOT_BAND          = 'Band Not Found';
    const HTTP_SUCCEED      = 200;
    const HTTP_NOT_FOUND    = 404;

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $queryParam = $this->request->getQueryParams();
        if(isset($queryParam['q'])){
            $albums = $this->_spotifyAlbumService->search($queryParam['q']);

            if($albums){
                return $this->respondWithData($albums, self::HTTP_SUCCEED);
            }
        }

        return $this->respondWithData(self::NOT_BAND, self::HTTP_NOT_FOUND);
    }
}