<?php
declare(strict_types=1);
namespace object\human;

class Student { 
  public function __construct(
    public string $name,
    public string $surname
  ){}

  public function study(): void{
    echo "I can study\n";
  }

  public function sleep(): void{
    echo "I sleep\n";
}
}


