<?php
class IntException extends Exception { }
class FloatException extends Exception { }
class StringException extends Exception { }
class BoolException extends Exception { }
class ArrayException extends Exception { }
class NullException extends Exception { }

class Noclass {}

    
function calculate($e) {
    try {        
        if (is_int($e)){
            throw new Exception("IntException");
        }
        else if (is_float($e)){
                throw new FloatException("FloatException");
            }
        else if (is_string($e)){
            throw new StringException("StringException");
        }
        else if (is_bool($e)){
            throw new BoolException("BoolException");
        }
        else if (is_array($e)){
            throw new ArrayException("ArrayException");
        }
        else if (is_null($e)){
            throw new NullException("NullException");
        }
        else {
            echo "No exception thrown\n";
        }
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


calculate(new Noclass());
