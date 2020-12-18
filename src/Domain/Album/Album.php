<?php
declare(strict_types=1);

namespace App\Domain\Album;

use JsonSerializable;

class Album implements JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $released;

    /**
     * @var int
     */
    private $tracks;

    /**
     * @var Cover|null
     */
    private $cover;

    /**
     * Album constructor.
     * @param string $name
     * @param string $released
     * @param int $tracks
     * @param Cover|null $cover
     */
    public function __construct(string $name, string $released, int $tracks, ?Cover $cover)
    {
        $this->name = $name;
        $this->released = $released;
        $this->tracks = $tracks;
        $this->cover = $cover;
    }

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
    public function getReleased(): string
    {
        return $this->released;
    }

    /**
     * @param string $released
     */
    public function setReleased(string $released): void
    {
        $this->released = $released;
    }

    /**
     * @return int
     */
    public function getTracks(): int
    {
        return $this->tracks;
    }

    /**
     * @param int $tracks
     */
    public function setTracks(int $tracks): void
    {
        $this->tracks = $tracks;
    }

    /**
     * @return Cover|null
     */
    public function getCover(): Cover
    {
        return $this->cover;
    }

    /**
     * @param Cover $cover
     */
    public function setCover(Cover $cover): void
    {
        $this->cover = $cover;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'released' => $this->released,
            'tracks' => $this->tracks,
            'cover' => $this->cover,
        ];
    }
}
