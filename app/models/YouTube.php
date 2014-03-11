<?php

class YouTube {

  private $key;
  private $path;
  private $source;
  private $response;

  public function __construct($source) {
    $this->key = getenv('YOU_TUBE');
    $this->path = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=';
    $this->source = $source;
  }

  public function fetch() {
    $url = $this->path . $this->source['target'] . '&key=' . $this->key; 
    $json = file_get_contents($url);

    return $this->parse($json);
  }

  private function parse($json) {
    $response = [];
    $response['status'] = 'fail';
    $response['source'] = [
      'type' => $this->source['type'], 
      'source' => $this->source['source'], 
      'target' => $this->source['target']
    ];

    $obj = json_decode($json);

    $count = $obj->pageInfo->totalResults;
    $index = rand(0, $count - 1);
    
    if(isset($obj->items[$index])) {
      $response['title'] = $obj->items[$index]->snippet->title;
      $response['content'] = $obj->items[$index]->snippet->resourceId->videoId;
      $response['status'] = 'success';
    }

    return $response;
  }

}
