<?php
declare(strict_types=1);
namespace object\tech\transport;

class Car { 
  public function __construct(
    public string $mark,
    public float $mileage
  ){}

  public function drive(): void{
    echo "I can drive";
  }

  public function driveMile(): void{
    $this->mileage += 1;
}
}


