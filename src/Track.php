<?php

namespace Jalle19\xsphpf;

/**
 * Class Track
 * @package Jalle19\xsphpf
 */
class Track
{

    /**
     * @var string
     */
    private $location;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var int|null
     */
    private $duration;

    /**
     * @var string|null
     */
    private $image;

    /**
     * Track constructor.
     *
     * @param string      $location
     * @param null|string $title
     * @param int|null    $duration
     * @param null|string $image
     */
    public function __construct($location, $title = null, $duration = null, $image = null)
    {
        $this->location = $location;
        $this->title    = $title;
        $this->duration = $duration;
        $this->image    = $image;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     *
     * @return Track
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function hasTitle()
    {
        return $this->title !== null;
    }

    /**
     * @param null|string $title
     *
     * @return Track
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return bool
     */
    public function hasDuration()
    {
        return $this->duration !== null;
    }

    /**
     * @param int|null $duration
     *
     * @return Track
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return bool
     */
    public function hasImage()
    {
        return $this->image !== null;
    }

    /**
     * @param null|string $image
     *
     * @return Track
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Returns a DOMElement representing the track
     *
     * @param \DOMDocument $document the document the element will ultimately be appended to
     *
     * @return \DOMElement
     */
    public function getDomElement(\DOMDocument $document)
    {
        $track = $document->createElement('track');

        // Add the mandatory location element
        $location = $document->createElement('location');
        $location->appendChild($document->createCDATASection($this->getLocation()));

        $track->appendChild($location);

        // Add optional elements
        if ($this->hasTitle()) {
            $title = $document->createElement('title');
            $title->appendChild($document->createCDATASection($this->getTitle()));
            $track->appendChild($title);
        }

        if ($this->hasDuration()) {
            $duration = $document->createElement('duration');
            $duration->appendChild($document->createCDATASection($this->getDuration()));
            $track->appendChild($duration);
        }

        if ($this->hasImage()) {
            $image = $document->createElement('image');
            $image->appendChild($document->createCDATASection($this->getImage()));
            $track->appendChild($image);
        }

        return $track;
    }

}
