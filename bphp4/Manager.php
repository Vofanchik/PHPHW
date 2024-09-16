<?php

class Manager extends worker implements LeadInterface, WebinarSpeakerInterface {
  public function command(): void{
    echo "Работай, пожалуйста!\n";
  }
  public function getFaired(worker $worker): void {
    echo "{$worker->fio} уволен, к сожалению\n";
  }
  public function downSalary(worker $worker): void{
    $worker->salary -= $worker->salary * 0.05;
    echo "Зарплата {$worker->fio} теперь {$worker->salary}\n";
    
  }
  public function speak(): void{
    echo "Я проведу семинар по agile\n";
  }

}