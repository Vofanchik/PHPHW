<?php
class Person {

    private $name;
    private $age;
    private $login;

    public function __construct($name, $age, $login) {
        $this->name = $name;
        $this->age = $age;
        $this->login = $login;
    }


    public function __get($prop) {
        return $this->$prop;
    }

    public function __set($prop, $value) {
        $this->$prop = $value;
    }

    public function __sleep() {
        echo "now serialize\n";
        return ['name', 'age', 'login'];
    }

    public function __wakeup() {
        echo "now deserialize\n";
    }

    public function __toString() {
        return $this->name . ' (' . $this->login . '), age ' . $this->age . PHP_EOL;
    }

}

$person = new Person('John Smith', 30, 'john_smith');
echo $person;

$serialized = serialize($person);

echo $serialized . PHP_EOL;

$serialized = str_replace(
    "John Smith",
    "Jeanh Dull",
    $serialized
);

$person = unserialize($serialized);
echo $person;


class PeopleList implements IteratorAggregate {

    private $people = [];

    public function addPerson(Person $person) {
        $this->people[] = $person;
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->people);
    }
}


$peopleList = new PeopleList();
$peopleList->addPerson(new Person('John Smith', 30, 'john_smith'));
$peopleList->addPerson(new Person('Jane Doe', 25, 'jane_doe'));
$peopleList->addPerson(new Person('Rayan Dann', 70, 'r_d'));

foreach ($peopleList as $person) {
    echo $person;
}




// trait MobileUserAuthentication
// {
//     public $user = 'user';
//     public $pass = 'pass';
//     public function authenticate($username, $password){
//         if($this->user == $username  && $this->pass == $password){
//             echo "Mobile pass\n";
//         }
//         else {
//             echo "Mobile wrong\n";
//         }
//     }
// }

// trait AppUserAuthentication
// {
//     public $user = 'user';
//     public $pass = 'pass';
//     public function authenticate($username, $password){
//         if($this->user == $username  && $this->pass == $password){
//             echo "App pass\n";
//         }
//         else {
//             echo "App wrong\n";
//         }
//     }
// }

// class App{
//     use MobileUserAuthentication, AppUserAuthentication {
//         MobileUserAuthentication::authenticate insteadof AppUserAuthentication;
//         AppUserAuthentication::authenticate as appUserAuthentication;
//     }

//     public function runAuth(string $username, string $password, bool $isApp){
//         if($isApp == false){
//             $this->authenticate($username, $password);}
//         else{
//             $this->appUserAuthentication($username, $password);
//         }

//     }
// }

// $app = new App();
// $app->runAuth('user','pass',true);
// $app->runAuth('user','pass',false);
