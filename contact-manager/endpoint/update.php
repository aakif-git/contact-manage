<?php
include('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactID = $_POST['tbl_contact_id'];
    $updateContactName = $_POST['contact_name'];
    $updateContactNumber = $_POST['contact_number'];
    $updateContactEmail = $_POST['contact_email'];
    $updateContactAddress = $_POST['contact_address'];

    // Check if a new image file is uploaded
    if ($_FILES['contact_image']['tmp_name'] != "") {
        $targetDir = "../images/";
        $targetFile = $targetDir . basename($_FILES['contact_image']['name']);
        move_uploaded_file($_FILES['contact_image']['tmp_name'], $targetFile);

        // Update the contact information including the image
        $stmt = $conn->prepare("UPDATE tbl_contact SET contact_name = ?, contact_number = ?, contact_email = ?, contact_address = ?, contact_image = ? WHERE tbl_contact_id = ?");
        $stmt->execute([$updateContactName, $updateContactNumber, $updateContactEmail, $updateContactAddress, $_FILES['contact_image']['name'], $contactID]);
    } else {
        // Update the contact information without changing the image
        $stmt = $conn->prepare("UPDATE tbl_contact SET contact_name = ?, contact_number = ?, contact_email = ?, contact_address = ? WHERE tbl_contact_id = ?");
        $stmt->execute([$updateContactName, $updateContactNumber, $updateContactEmail, $updateContactAddress, $contactID]);
    }

    // Redirect back to the main page after update
    header("location: http://localhost/contact-manager/");
    exit();
}
?>
