<?php
    $host = "tsuts.tskoli.is";

    $db = "0803992199_VshVerk4";

    $user = "0803992199";
    $password = "mypassword";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        
    }

    catch(PDOEception $e){
        echo "Tenging mistókst: " . $e->getMessage();
    }

    $name = $_POST['nafn'];
    $email = $_POST['email'];
    $eventName = $_POST['EventName'];

    $stmt = $conn->prepare("INSERT INTO gestir (name, email, eventName)
                        VALUES(:name, :email, :eventName)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':eventName', $eventName);
    $stmt->execute();

    echo '<script>alert("Þú hefur verið skráður á ',$eventName,'");</script>';
    header("location: index.html");
?>