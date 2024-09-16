<?php

class Tester extends worker implements ApplicationCreatorInterface, WebinarSpeakerInterface {

  public function speak(): void{
    echo "Я проведу семинар по Postman\n";
  }
  
  public function creator(): void{
    echo "Тестю код\n";
  }

  public function distant(): void{
    echo "Можно в офис?\n";
  }

}