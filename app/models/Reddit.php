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
    $obj = $obj->data;
    
    $count = count($obj->children);
    if($this->source['type'] === 'text') {

      $i = 0;
      while(!isset($response['title']) && $i < $count) {
        if($obj->children[$i]->data->title !== null && $obj->children[$i]->data->selftext !== null) {
          $response['title'] = $obj->children[$i]->data->title;
          $response['content'] = $obj->children[$i]->data->selftext;
          $response['status'] = 'success';
        }
        
        $i++;
      }
    } else if($this->source['type'] === 'image') {

      $i = 0;
      while(!isset($response['title']) && $i < $count) {
        if(stripos($obj->children[$i]->data->domain, 'imgur.com') !== false
           && $obj->children[$i]->data->title !== null
           && $obj->children[$i]->data->url !== null) {
           
           $response['title'] = $obj->children[$i]->data->title;
           $response['content'] = urlencode($obj->children[$i]->data->url);
           $response['status'] = 'success';
        }

        $i++;
      }
    }

    return $response;
  }

}
