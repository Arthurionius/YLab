<?php
abstract class User {
    abstract function new();
    abstract function save();

    function getName($name) {
        return "Your name is $name.<br>";
    }
}

class Person extends User {
    function new() {
        echo "Новый пользователь";
    }

    function save() {
        echo "Сохранен";
    }

    function getName($name) {
        return parent::getName($name) . "Здорово!";
    }
}

$bob = new Person();
$msg = $bob->getName("Боб");
echo $msg;
?>