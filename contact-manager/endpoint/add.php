<?php
include('../conn/conn.php');

$contactName = $_POST['contact_name'];
$contactNumber = $_POST['contact_number'];
$contactEmail = $_POST['contact_email'];
$contactAddress = $_POST['contact_address'];

// Make sure to use $_FILES['contact_image']['name'] for the file name
$contactImageName = $_FILES['contact_image']['name'];
$contactImageTmpName = $_FILES['contact_image']['tmp_name'];

$target_dir = "../images/";
$target_file = $target_dir . basename($contactImageName);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a valid image
if(isset($_POST["submit"])) {
    $check = getimagesize($contactImageTmpName);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}

// Check file size
if ($_FILES["contact_image"]["size"] > 500000) {
    $uploadOk = 0;
}

// Allow only certain image formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($contactImageTmpName, $target_file)) {
        $contactImage = $contactImageName;

        $stmt = $conn->prepare("INSERT INTO `tbl_contact` (`tbl_contact_id`,`contact_image`, `contact_name`, `contact_number`, `contact_email`, `contact_address`) VALUES (NULL, :contactImage, :contactName, :contactNumber, :contactEmail, :contactAddress)");
        $stmt->bindParam(':contactImage', $contactImage);
        $stmt->bindParam(':contactName', $contactName);
        $stmt->bindParam(':contactNumber', $contactNumber);
        $stmt->bindParam(':contactEmail', $contactEmail);
        $stmt->bindParam(':contactAddress', $contactAddress);
        $stmt->execute();

        header("location: http://localhost/contact-manager/");
    } else {
        echo "Sorry, there was an error uploading your file.";
        header("location: http://localhost/contact-manager/");
    }
}
?>
