<?php
include('conn/conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .middle {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert alert-dark" role="alert">
            <h3 class="text text-center">Online Contact Managment System</h3>
        </div>

        <!-- Add Contact Modal Trigger -->
        <div class="row mb-3">
            <div class="middle">
                <div class="">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                        data-bs-target="#addContactModal"><i class="fa-regular fa-user"></i>&nbsp;Add Contact</button>
                </div>
                <div class="">
                    <button type="button" class="logout" data-bs-toggle="modal"><i
                            class="fa-solid fa-sign-out-alt"></i>&nbsp;Logout</button>
                </div>
            </div>

            <!-- Add Contact Modal -->
            <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="contactModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="endpoint/add.php" method="POST" class="add-form"
                                enctype="multipart/form-data">
                                <div class="form-group" hidden>
                                    <label for="contactID">Contact ID</label>
                                    <input type="text" class="form-control" id="contactID" name="tbl_contact_id">
                                </div>
                                <div class="form-group">
                                    <label for="contactImage">Contact Image</label>
                                    <input type="file" class="form-control" id="contactImage" name="contact_image"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="contactName">Contact Name</label>
                                    <input type="text" class="form-control" id="contactName" name="contact_name"
                                        placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Phone Number</label>
                                    <input type="text" class="form-control" id="contactNumber" name="contact_number"
                                        maxlength="10" placeholder="10 Digit Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactEmail">Email Addres</label>
                                    <input type="email" class="form-control" id="contactEmail" name="contact_email"
                                        placeholder="Active Email Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactAddress">Address</label>
                                    <input type="text" class="form-control" id="contactAddress" name="contact_address"
                                        placeholder="Current Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactAddress">Designation</label>
                                    <input type="text" class="form-control" id="cotactDesignation" name="contact_designation"
                                        placeholder="Current Designation" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Contact Modal -->
            <div class="modal fade" id="updateContactModal" tabindex="-1" aria-labelledby="contactModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactModalLabel">Update Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="endpoint/update.php" method="POST" class="add-form"
                                enctype="multipart/form-data">
                                <div class="form-group" hidden>
                                    <label for="updateContactID">Contact ID</label>
                                    <input type="text" class="form-control" id="updateContactID" name="tbl_contact_id">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactImage">Contact Image</label>
                                    <input type="file" class="form-control" id="updateContactImage"
                                        name="contact_image">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactName">Contact Name</label>
                                    <input type="text" class="form-control" id="updateContactName" name="contact_name">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactNumber">Phone Number</label>
                                    <input type="text" class="form-control" id="updateContactNumber"
                                        name="contact_number" maxlength="11">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactEmail">Email Addres</label>
                                    <input type="email" class="form-control" id="updateContactEmail"
                                        name="contact_email">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactAddress">Address</label>
                                    <input type="text" class="form-control" id="updateContactAddress"
                                        name="contact_address">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactDesignation">Designation</label>
                                    <input type="text" class="form-control" id="updateContactAddress"
                                        name="contact_designation">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="main mt-3">
                <div class="card" style="padding: 20px;">
                    <table class="table table">
                        <thead>
                            <tr>
                                <th>Contact ID</th>
                                <th>Image</th>
                                <th>Full Name</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Address</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            include('conn/conn.php');

                            $stmt = $conn->prepare("SELECT * FROM `tbl_contact`");
                            $stmt->execute();

                            $result = $stmt->fetchAll();

                            foreach ($result as $row) {

                                $contactID = $row['tbl_contact_id'];
                                $contactImage = $row['contact_image'];
                                $contactName = $row['contact_name'];
                                $contatcNumber = $row['contact_number'];
                                $contactEmail = $row['contact_email'];
                                $contactAddress = $row['contact_address'];
                                $contactDesignation = $row['Designation'];


                                ?>

                                <tr>
                                    <td id="contactID-<?= $contactID ?>">
                                        <?php echo $contactID ?>
                                    </td>
                                    <td id="contactImage-<?= $contactID ?>"><img src="images/<?php echo $contactImage ?>"
                                            class="img-fluid" style="width: 100px" alt=""></td>
                                    <td id="contactName-<?= $contactID ?>">
                                        <?php echo $contactName ?>
                                    </td>
                                    <td id="contactNumber-<?= $contactID ?>">
                                        <?php echo $contatcNumber ?>
                                    </td>
                                    <td id="contactEmail-<?= $contactID ?>">
                                        <?php echo $contactEmail ?>
                                    </td>
                                    <td id="contactAddress-<?= $contactID ?>">
                                        <?php echo $contactAddress ?>
                                    </td>
                                    <td id="contactDesignation-<?= $contactID ?>">
                                        <?php echo $contactDesignation ?>
                                    </td>
                                    <td>
                                        <div>
                                            <button type="submit" class="btn-secondary"
                                                onclick="update_contact('<?php echo $contactID ?>')"><i
                                                    class="fa-solid fa-pencil"></i></button>
                                            <button type="button" class="btn-danger"
                                                onclick="delete_contact('<?php echo $contactID ?>')"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>

        // update contact

        function update_contact(id) {
            $("#updateContactModal").modal("show");

            let updateContactID = $("#contactID-" + id).text();
            let updateContactImage = $("#contactImage-" + id).find('img').attr('src');
            let updateContactName = $("#contactName-" + id).text();
            let updateContactNumber = $("#contactNumber-" + id).text();
            let updateContactEmail = $("#contactEmail-" + id).text();
            let updateContactAddress = $("#contactAddress-" + id).text();
            let updateContactDesignation = $("#contactDesignation-" + id).text();
            console.log(updateContactImage);
            $("#updateContactID").val(updateContactID);
            $("#updateContactName").val(updateContactName);
            $("#updateContactNumber").val(updateContactNumber);
            $("#updateContactEmail").val(updateContactEmail);
            $("#updateContactAddress").val(updateContactAddress);
            $("#updateContactAddress").val(updateContactDesignation);

            // Set the src attribute of the image input using val() method
            $("#updateContactImage").html(updateContactImage);
        }


        // delete contact
        function delete_contact(id) {

            if (confirm("Do you confirm to delete this contact?")) {
                window.location = "endpoint/delete.php?contact=" + id
            }
        }
    </script>

    <!-- Bootstrap Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        const logout = document.querySelector(".logout");

        logout.addEventListener("click", function () {
            // Redirect to logout.php which will destroy the session and redirect to the login page
            window.location.href = "/contact-manager/"
        })
    </script>
</body>

</html>