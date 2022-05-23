<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Получаем данные с формы
    if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
        $firstname = test_input($_POST['firstname']);
        $lastname = test_input($_POST['lastname']);
    }

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "Users";

    //Подключаемся и проверяем подключение
    $conn = new mysqli($dbhost, $dbuser, $dbpass);
    if ($conn->connect_error) {
        die("Соединение не установлено: " . $conn->connect_error);
    }
    
    //Создаем БД
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Создана БД с именем $dbname<br>";
    } else {
        echo "Ошибка: " . $conn->error;
        echo "<br>";
    }

    //Подключаемся к созданной БД
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Соединение не установлено: " . $conn->connect_error . "<br>");
    }

    //Создаем таблицу и заносим туда данные
    $sql = "CREATE TABLE users(
        id INT(2) AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL
        )";

    if ($conn->query($sql) === TRUE) {
        echo "Таблица users создана<br>";
    } else {
        echo "Ошибка: " . $conn->error . "<br>";
    }

    $sql = "INSERT INTO users (firstname, lastname) VALUES ('$firstname', '$lastname')";
    if ($conn->query($sql)) {
        echo "Данные успешно добавлены<br>";
    } else {
        echo "Ошибка " . $conn->error;
    }

    //Получение данных
    $sql = "SELECT * FROM users";
    if ($result = $conn->query($sql)) {
        foreach($result as $row){
            $nameFromDB = $row['firstname'];
            $lastnameFromDB = $row['lastname'];
        }
    } else {
        echo "Ошибка: " . $conn->error;
    }

    echo "Привет, $nameFromDB $lastnameFromDB<br>";

    //Отключаемся
    $conn->close();
?>