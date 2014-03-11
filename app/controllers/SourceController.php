<?php

class SourceController extends BaseController {
  
  private $type;

  public function getSource($mood, $type) {
    $this->type = $type;

    if($mood === 'playful') {
      return $this->getPlayfulSource();
    } else if($mood === 'depressed') {
       return $this->getDepressedSource();
    } else if($mood === 'zonked') {
      return $this->getZonkedSource();
    }
  }

  /* 
   * Sources are returned shuffled to be scraped in order until a match 
   * based on the type specified is found.
   */
  private function getZonkedSource() {
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
          'stonerphilosophy',
          'quotes',
          'luciddreaming'
        ];
      }
    } else if ($this->type === 'image') {
      if($source['image'][0] === 'reddit') {
        $target = [
          'surreal',
          'mildlyinteresting',
          'woahdude',
          'earthporn',
          'quotesporn'
        ];
      }
    } else if ($this->type === 'video') {
      if($source['video'][0] === 'youtube') {
        $target = [
          'PL5gcv_l9e7VWkjF3ft6Cv6E9N5jyIIlp_' // netanoids-zonked playlist (greg@greg-considine.com
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

  private function getDepressedSource() {
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

    shuffle($source[$this->type]);

    $target = [];
    if($this->type === 'text') {
      if($source['text'][0] === 'reddit') {
        $target = [
          'howtonotgiveafuck',
          'lonely',
          'sad',
          'foreveralone'
        ];
      }
    } else if ($this->type === 'image') {
      if($source['image'][0] === 'reddit') {
        $target = [
          'funnyandsad',
          'sad',
          'foreveralone',
          'baww'
        ];
      }
    } else if ($this->type === 'video') {
      if($source['video'][0] === 'youtube') {
        $target = [
          'PL5gcv_l9e7VWgKHe-cgZHP1o2K411xeZF' // netanoids-depressed playlist
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

  private function getPlayfulSource() {
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

    shuffle($source[$this->type]);

    $target = [];
    if($this->type === 'text') {
      if($source['text'][0] === 'reddit') {
        $target = [
          'jokes',
          'puns',
          'dadjokes',
          'humor',
          'humour'
        ];
      }
    } else if ($this->type === 'image') {
      if($source['image'][0] === 'reddit') {
        $target = [
          'funny',
          'pics'
        ];
      }
    } else if ($this->type === 'video') {
      if($source['video'][0] === 'youtube') {
        $target = [
          'PL5gcv_l9e7VU2JYNlp9w7PJzvSerMx1-1' // netanoids-playful playlist
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


