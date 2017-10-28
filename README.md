# xsphpf

A minimal library for creating XSPF playlists.

[![Build Status](https://travis-ci.org/Jalle19/xsphpf.svg?branch=master)](https://travis-ci.org/Jalle19/xsphpf)
[![Coverage Status](https://coveralls.io/repos/github/Jalle19/xsphpf/badge.svg?branch=master)](https://coveralls.io/github/Jalle19/xsphpf?branch=master)

## Requirements

* PHP >= 5.4

## Installation

```bash
composer require jalle19/xsphpf
```

## Usage

```php
<?php

// Create a playlist
$playlist = new Jalle19\xsphpf\Playlist();

// Create a track
$track = new Jalle19\xsphpf\Track('http://example.com/song_1.mp3');

// Define some optional attributes for the track
$track->setTitle('Some fancy title')
      ->setDuration(300)
      ->setImage('http://example.com/image.jpeg');

// Add the track to the playlist
$playlist->addTrack($track);

// Serialize the playlist to XML
$xml = $playlist->__toString();
```

## License

GPL-3
