<?php

// error handler
function emptyInput($fullName, $dateOfBirth, $idNumber, $email) {
    $result;
    if (empty($fullName) || empty($dateOfBirth) || empty($idNumber) || empty($email)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function addVaccine ($conn, $fullName, $dateOfBirth,  $idNumber, $email, $physicallyImpaired, $homeAddress, $zipcode) {

    $sql = "INSERT INTO vaccine (fullName, dateOfBirth, idNumber, email, physicallyImpaired, homeAddress, zipcode) VALUES ('" . $fullName . "', '" . $dateOfBirth . "', '" . $idNumber . "', '" . $email . "', '" . $physicallyImpaired . "', '" . $homeAddress . "', '" . $zipcode . "')";

  if (mysqli_query($conn, $sql)) {
    header("location: ./success.php");
    exit();
  } 
}

function addTesting ($conn, $fullName, $dateOfBirth,  $idNumber, $email, $physicallyImpaired, $homeAddress, $zipcode) {

    $sql = "INSERT INTO testing (fullName, dateOfBirth, idNumber, email, physicallyImpaired, homeAddress, zipcode) VALUES ('" . $fullName . "', '" . $dateOfBirth . "', '" . $idNumber . "', '" . $email . "', '" . $physicallyImpaired . "', '" . $homeAddress . "', '" . $zipcode . "')";

  if (mysqli_query($conn, $sql)) {
    header("location: ./success.php");
    exit();
  } 
}


?>