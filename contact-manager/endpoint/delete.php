<?php
session_start();
include('../conn/conn.php');

if (isset($_GET['contact'])) {
    $contact = $_GET['contact'];

    try {

        $query = "DELETE FROM `tbl_contact` WHERE tbl_contact_id ='$contact'";

        $statement = $conn->prepare($query);
        $query_execute = $statement->execute();

        if ($query_execute) {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location:http://localhost/contact-manager/');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Deleted";
            header('Location:http://localhost/contact-manager/');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
