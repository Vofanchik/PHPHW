<?php

class Prog extends worker implements ApplicationCreatorInterface, WebinarSpeakerInterface {

  public function speak(): void{
    echo "Я проведу семинар по PHP\n";
  }
  
  public function creator(): void{
    echo "Пишу код\n";
  }

  public function distant(): void{
    echo "Можно на удалёнку?\n";
  }

}