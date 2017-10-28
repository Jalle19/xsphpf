<?php

namespace Jalle19\xsphpf\Tests;

use Jalle19\xsphpf\Playlist;
use Jalle19\xsphpf\Track;
use PHPUnit\Framework\TestCase;

/**
 * Class PlaylistTest
 * @package Jalle19\xsphpf\Tests
 */
class PlaylistTest extends TestCase
{

    /**
     * Tests serialization of an empty playlist
     */
    public function testEmptyPlaylist()
    {
        $playlist = new Playlist();

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../resources/empty_playlist.xml', $playlist->__toString());
    }

    /**
     * Tests serialization of a playlist with tracks containing only a location
     */
    public function testTracksLocationOnly()
    {
        $playlist = new Playlist([
            new Track('http://example.com/song_1.mp3'),
            new Track('http://example.com/song_2.mp3'),
            new Track('http://example.com/song_3.mp3'),
        ]);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../resources/playlist_tracks_location_only.xml',
            $playlist->__toString());
    }

    /**
     * Tests serialization of a playlist with tracks containing all supported elements
     */
    public function testTracksWithAdditionalElements()
    {
        $track = new Track('http://example.com/song_1.mp3');
        $track->setTitle('Some fancy title')
              ->setDuration(300)
              ->setImage('http://example.com/image.jpeg');

        // Use addTrack() to check that one works too
        $playlist = new Playlist();
        $playlist->addTrack($track);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../resources/playlist_tracks_additional_elements.xml',
            $playlist->__toString());
    }

}
