<?php
declare(strict_types=1);

namespace App\Application\Actions\Album;

use App\Application\Actions\Action;
use App\Domain\Album\Service\SpotifyAlbumService;
use Psr\Log\LoggerInterface;

abstract class AlbumAction extends Action
{
    /**
     * @var SpotifyAlbumService
     */
    protected $_spotifyAlbumService;

    /**
     * AlbumAction constructor.
     * @param LoggerInterface $logger
     * @param SpotifyAlbumService $spotifyAlbumService
     */
    public function __construct(LoggerInterface $logger, SpotifyAlbumService $spotifyAlbumService)
    {
        parent::__construct($logger);
        $this->_spotifyAlbumService = $spotifyAlbumService;

    }
}
