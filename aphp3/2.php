<?php
trait MobileUserAuthentication
{
    public $user = 'user';
    public $pass = 'pass';
    public function authenticate($username, $password){
        if($this->user == $username  && $this->pass == $password){
            echo "Mobile pass\n";
        }
        else {
            echo "Mobile wrong\n";
        }
    }
}

trait AppUserAuthentication
{
    public $user = 'user';
    public $pass = 'pass';
    public function authenticate($username, $password){
        if($this->user == $username  && $this->pass == $password){
            echo "App pass\n";
        }
        else {
            echo "App wrong\n";
        }
    }
}

class App{
    use MobileUserAuthentication, AppUserAuthentication {
        MobileUserAuthentication::authenticate insteadof AppUserAuthentication;
        AppUserAuthentication::authenticate as appUserAuthentication;
    }

    public function runAuth(string $username, string $password, bool $isApp){
        if($isApp == false){
            $this->authenticate($username, $password);}
        else{
            $this->appUserAuthentication($username, $password);
        }

    }
}

$app = new App();
$app->runAuth('user','pass',true);
$app->runAuth('user','pass',false);
