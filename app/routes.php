<?php
declare(strict_types=1);

use \App\Application\Actions\Album\ListAlbumAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->group('/api/v1', function (Group $group) {
        $group->get('/albums', ListAlbumAction::class);
    });
};
