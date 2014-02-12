<?php

class SourceController extends BaseController {
  
  private $type;

  public function getSource($mood, $type) {
    $this->type = $type;

    if($mood === 'playful') {
      return $this->getPlayfulSource();
    }
  }

  /* 
   * Sources are returned shuffled to be scraped in order until a match 
   * based on the type specified is found.
   */
  private function getPlayfulSource() {
    /* Types and general sources */
    $source = [
      'text' => [
        'reddit'
      ],
      'image' => [
        'reddit'
      ],
      'video' => [
        'youtube'
      ]
    ];

    /* Randomize general source based on type */
    shuffle($source[$this->type]);

    /* Randomize a target source based on general source and type */
    $target = [];
    if($this->type === 'text') {
      if($source['text'][0] === 'reddit') {
        $target = [
          'jokes',
          'puns',
          'dadjokes'
        ];
      }
    } else if ($this->type === 'image') {
      if($source['image'][0] === 'reddit') {
        $target = [
          'funny',
          'humor',
          'humour'
        ];
      }
    } else if ($this->type === 'video') {
      if($source['video'][0] === 'youtube') {
        $target = [
          'PL5gcv_l9e7VUEe8E9aql1ivdX8Fjc4a6L'
        ];
      }
    }
    
    shuffle($target);

    return [
      'type' => $this->type,
      'source' => $source[$this->type][0],
      'target' => $target[0]
    ];
  }
}


