<?php 
include '../assets/php/database.php';
$func = $_POST["func"];
$db = new Database;

if (function_exists($func)) {
    call_user_func($func);
}

function funcSaveGuest() {
    global $db;

    $fullname = $_POST["fullname"];
    $emailadd = $_POST["emailadd"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];

    try {
        if ($db->getStatus()) {
            $stmt = $db->getConnection()->prepare(addGuestQuery());
            $stmt->execute(array($fullname,$emailadd,$website,$comment));

            $res = $stmt->fetch();
            if (!$res) {
                echo "200";
                $db->closeConnection();
            } else {
                echo "500";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function funcGetGuest() {
    global $db;

    try {
        if ($db->getStatus()) {
            $stmt = $db->getConnection()->prepare(getGuestQuery());
            $stmt->execute();
            $res = $stmt->fetchAll();
            
            $db->closeConnection();
            echo json_encode($res);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}


function addGuestQuery()
{
    return "CALL addGuest(?,?,?,?)";
}

function getGuestQuery()
{
    return "CALL getTableGuests()";
}


?>