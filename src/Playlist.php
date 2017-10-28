<?php

namespace Jalle19\xsphpf;

/**
 * Class Playlist
 * @package Jalle19\xsphpf
 */
class Playlist
{

    const XSPF_XMLNS   = 'http://xspf.org/ns/0/';
    const XSPF_VERSION = 1;

    /**
     * @var Track[]
     */
    private $trackList;

    /**
     * Playlist constructor.
     *
     * @param array $trackList
     */
    public function __construct(array $trackList = [])
    {
        $this->trackList = $trackList;
    }

    /**
     * @param Track $track
     */
    public function addTrack(Track $track)
    {
        $this->trackList[] = $track;
    }

    /**
     * Serializes the playlist into XML
     */
    public function __toString()
    {
        $document = new \DOMDocument('1.0', 'UTF-8');

        // Create and add the playlist element
        $playlist = $document->createElement('playlist');
        $playlist->setAttribute('version', self::XSPF_VERSION);
        $playlist->setAttribute('xmlns', self::XSPF_XMLNS);
        $document->appendChild($playlist);

        // Create and add the trackList element
        $trackList = $document->createElement('trackList');
        $playlist->appendChild($trackList);

        // Add track elements
        foreach ($this->trackList as $track) {
            $trackList->appendChild($track->getDomElement($document));
        }

        // Use pretty printing
        $document->formatOutput = true;

        return $document->saveXML();
    }

}
