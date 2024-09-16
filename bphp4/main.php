<?php 

require_once('autoload.php');

$command[]  = new CEO('Иван', 1000, "Директор");
$command[]  = new Coworker('Вася', 100, "Сотрудник");
$command[]  = new Manager('Петя', 500, "Менеджер");
$command[]  = new Tester('Коля', 200, "Тестировщик");
$command[]  = new Prog('Сергей', 300, "Программист");
$totalSalary = 0;
foreach ($command as $person) {
  $totalSalary += $person->getSalary();
  echo "{$person->fio} - {$person->position}\n";
  if ($person instanceof LeadInterface) {
      $person->command();
  }
  if ($person instanceof WebinarSpeakerInterface) {
      $person->speak();
  }
  if ($person instanceof ApplicationCreatorInterface) {
      $person->creator();
  }
}
echo "Общая ЗП {$totalSalary} попугаев\n";
$totalPers = count($command);
echo "Штат {$totalPers} человек\n";
