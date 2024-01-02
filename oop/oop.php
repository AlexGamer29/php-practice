<?php

// PHP What is OOP
class ObjectOrientedProgramming {
    // PHP Classes/Objects
    public $property;

    // PHP Constructor
    public function __construct($value) {
        $this->property = $value;
        echo "Object created with value: $value\n";
    }

    // PHP Destructor
    public function __destruct() {
        echo "Object destroyed\n";
    }

    // PHP Access Modifiers
    private $privateProperty;
    protected $protectedProperty;

    // PHP Inheritance
    public function inheritedMethod() {
        echo "Method from parent class\n";
    }
}

class ChildClass extends ObjectOrientedProgramming {
    // Additional methods or properties for the child class
}

// PHP Constants
define('PI', 3.14);

// PHP Abstract Classes
abstract class AbstractClass {
    abstract protected function abstractMethod();
}

// PHP Interfaces
interface MyInterface {
    public function interfaceMethod();
}

// PHP Traits
trait MyTrait {
    public function traitMethod() {
        echo "Method from trait\n";
    }
}

// PHP Static Methods
class StaticExample {
    public static function staticMethod() {
        echo "Static method\n";
    }
}

// PHP Static Properties
class StaticProperty {
    public static $staticProperty = 42;
}

// PHP Namespaces
// namespace MyNamespace {
//     class MyClass {
//         public function myMethod() {
//             echo "Method within a namespace\n";
//         }
//     }
// }

// PHP Iterables
function iterateArray(iterable $iterable) {
    foreach ($iterable as $item) {
        echo $item . "\n";
    }
}

// Example usage
$obj = new ObjectOrientedProgramming('Example');

// Accessing inherited method
$obj->inheritedMethod();

// Using a constant
echo "Value of PI: " . PI . "\n";

// Creating an object of the child class
$childObj = new ChildClass('ChildExample');

// Using abstract class and interface
class ConcreteClass extends AbstractClass implements MyInterface {
    public function abstractMethod() {
        echo "Implementation of abstractMethod\n";
    }

    public function interfaceMethod() {
        echo "Implementation of interfaceMethod\n";
    }
}

// Using a trait
class ClassWithTrait {
    use MyTrait;
}

// Using static method
StaticExample::staticMethod();

// Using static property
echo "Static property value: " . StaticProperty::$staticProperty . "\n";

// Using namespaces
// $namespacedObj = new MyNamespace\MyClass();
// $namespacedObj->myMethod();

// Using iterables
$array = [1, 2, 3, 4, 5];
iterateArray($array);

?>
