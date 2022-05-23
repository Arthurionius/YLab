<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
        $firstname = test_input($_POST['firstname']);
        $lastname = test_input($_POST['lastname']);
    }

    echo "Привет, $firstname $lastname.";
?>