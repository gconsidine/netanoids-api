<?php

class ApiController extends BaseController {
  
  private $species;
  private $moods;
  private $types;
  private $userInputs;
  private $error;
  
  /* Populate arrays with all supported species, moods, types, and input */
  public function __construct() {
    $this->species = ['0'];
    $this->moods = ['playful'];
    $this->types = ['text', 'image', 'video'];
    $this->userInputs = ['yes', 'no'];
  }

	public function getIndex($species, $mood, $type, $userInput) {
    if(!$this->validateRequest($species, $mood, $type, $userInput)) {
      return $this->getErrorMessage();  
    }
    
    $sourceController = new SourceController();
    $source = $sourceController->getSource($mood, $type);

    $parseController = new ParseController();
    $response = $parseController->getResponse($source);

		return $response;
	}
  
  /* Verify request is supported */
  private function validateRequest($species, $mood, $type, $userInput) {
    if($this->validateSpecies($species) && $this->validateMood($mood) 
       && $this->validateType($type) && $this->validateUserInput($userInput)) {
      return true;
    } else {
      return false;
    }
  }

  private function validateSpecies($species) {
    if(!in_array($species, $this->species)) {
      $this->error = 'invalid species';
      return false;
    }

    return true;
  }
  
  private function validateMood($mood) {
    if(!in_array($mood, $this->moods)) {
      $this->error = 'invalid mood';
      return false;
    }

    return true;
  }

  private function validateType($type) {
    if(!in_array($type, $this->types)) {
      $this->error = 'invalid type';
      return false;
    }

    return true;
  }

  private function validateUserInput($userInput) {
    if(!in_array($userInput, $this->userInputs)) {
      $this->error = 'invalid user input';
      return false;
    }

    return true;
  }
  
  /* Return a string of the first error encountered in validation */
  private function getErrorMessage() {
    return '{ "status" : "Error: ' . $this->error . '" }';
  }

}
