<?php

class ParseController extends BaseController {
  
  private $source;
  private $response;

  public function getResponse($source) {
    $this->source = $source;

    if($source['source'] === 'reddit') {
      $this->parseRedditResponse();  
    } else if($source['source'] === 'youtube') {
      $this->parseYouTubeResponse();
    }

    return $this->arrayToJson($this->response);
  }

  private function parseRedditResponse() {
    $reddit = new Reddit($this->source);  
    $this->response = $reddit->fetch();
  }

  private function parseYouTubeResponse() {
    $youTube = new YouTube($this->source);
    $this->response = $youTube->fetch();
  }

  private function arrayToJson($array) {
    return json_encode($array);
  }

  private function getErrorMessage() {
    return '{ 
      "status": "fail",
      "message": Invalid JSON Response" 
    }';
  }

  private function setResponse($response) {
    $this->response = $response; 
  }
}
