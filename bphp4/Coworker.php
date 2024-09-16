<?php

class Coworker extends worker {
  public function wantSalary(): void {
    echo "Привет, я {$this->fio}! Повысь ЗП!\n";
  }

  public function haveBreak(): void {
    echo "Привет, у меня перерыв\n";
  }

  public function haveDinner(): void {
    echo "Привет, у меня обед\n";
  }  
  
}