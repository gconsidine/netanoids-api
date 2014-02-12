<?php

class ParseController extends BaseController {
  
  private $source;
  private $response;

  public function getResponse($source) {
    $this->source = $source;

    if($source['source'] === 'reddit') {
      $this->parseRedditResponse();  
    } else if($source['source'] === 'youtube') {
      $this->parseYoutubeResposne();
    }

    return $this->response;
  }

  private function parseRedditResponse() {
    $reddit = new Reddit($this->source);  

    // TODO: Choose first of type if it exists or return error */
    $this->response = $reddit->fetch();
  }

  private function parseYouTubeResponse() {
    $json = new YouTube($this->source);

  }

  private function getErrorMessage() {
    return '{ "status" : "Error: Invalid JSON Response" }';
  }

  private function setResponse($response) {
    $this->response = $response; 
  }
}
