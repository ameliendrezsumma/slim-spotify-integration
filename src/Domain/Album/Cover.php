<?php
declare(strict_types=1);

namespace App\Domain\Album;

use JsonSerializable;

class Cover implements JsonSerializable
{
    /**
     * @var int
     */
    private $height;

    /**
     * @var int
     */
    private $width;

    /**
     * @var string
     */
    private $url;


    /**
     * Cover constructor.
     * @param int $height
     * @param int $width
     * @param string $url
     */
    public function __construct(int $height, int $width, string $url)
    {
        $this->height = $height;
        $this->width = $width;
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getHeight() : int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height) : void
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth() : int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width) : void
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'height' => $this->height,
            'width' => $this->width,
            'url' => $this->url
        ];
    }
}