<?php

class Reddit {

  private $path;
  private $source;
  private $response;

  public function __construct($source) {
    $this->path = 'http://www.reddit.com/r/';
    $this->source = $source;
  }

  public function fetch() {
    $url = $this->path . $this->source['target'] . '/top.json'; 
    return file_get_contents($url);
  }

  private function parse() {

  }
}
