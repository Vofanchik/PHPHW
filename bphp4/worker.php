<?php

class worker  {
  public function __construct(
    public string $fio,
    public float $salary,
    public string $position,
  ){}

  public function getFio(): string {
    return $this->fio;
  }

  public function getSalary(): float {
    return $this->salary;
  }
}