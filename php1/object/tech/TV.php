<?php
declare(strict_types=1);
namespace object\tech;

class TV { 
  public function __construct(
    public string $model,
    public float $cost
  ){}

  public function show(): void{
    echo "I can show\n";
  }

  public function evaluateCost(): void{
    if ($this->cost > 100) {
      echo "I'm expensve\n";
    } else {
      echo "I'm cheap\n";
    };
  }
}


