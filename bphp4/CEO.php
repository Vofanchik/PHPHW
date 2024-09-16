<?php

class CEO extends worker implements LeadInterface {
  public function command(): void{
    echo "Работай!\n";
  }
  public function getFaired(worker $worker): void {
    echo "{$worker->fio} уволен\n";
  }
  public function downSalary(worker $worker): void{
    $worker->salary -= $worker->salary * 0.1;
    echo "Зарплата {$worker->fio} теперь {$worker->salary}\n";
    
  }

}