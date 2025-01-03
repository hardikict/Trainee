<?php include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container mt-5 ">
            <h3 class="text-center">Ragistation Form</h3>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">FirstName</label>
                <input type="text" class="form-control" id="firstName" name="firstName">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">LastName</label>
                <input type="text" class="form-control" id="lastName" name="lastName">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="empPassword" name="empPassword">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            </div>
            <div class="mb-3">
                <label for="exampleInputprofileimage" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="profileImage" name="profileImage">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
            </div>
            <!-- Gender -->
            <div class="form-check pt-4">
                <input class="form-check-input" type="radio" name="gender" value="female" id="gender">
                <label class="form-check-label" for="flexRadioDefault1">
                    female
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="male" id="gender1">
                <label class="form-check-label" for="flexRadioDefault2">
                    male
                </label>
            </div>
            <!-- Hobbby -->
            <div class="form-check pt-4">
                <input class="form-check-input" type="checkbox" value="Cricket" id="cricket" name="hobby[]">
                <label class="form-check-label" for="flexCheckDefault">
                    Cricket
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Runnig" id="runnig" name="hobby[]">
                <label class="form-check-label" for="flexCheckChecked">
                    Runnig
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Writing" id="writing" name="hobby[]">
                <label class="form-check-label" for="flexCheckDefault">
                    Writing
                </label>
            </div>
            <!-- Country -->
            <div class="dropdown pt-3 pb-4  ">
                <label for="country">Choose a country:</label>
                <select name="country" id="country">
                    <option value="option">Select</option>
                    <option value="India">India</option>
                    <option value="UK">Uk</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Japan">Japan</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Afganistan">Afganitan</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <button type="submit" name="fetch" class="btn btn-dark"><a href="fetch.php">Fetch</a></button>
    </form>
    </div>

    <?php
    //insert data

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $empPassword = $_POST['empPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $profileImage = $_FILES['profileImage']['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $gender = $_POST['gender'];
        $hobby = implode(",", $_POST['hobby']);
        $country = $_POST['country'];        

        //Image uplod
        if (isset($_FILES['profileImage'])) {
          
           $target_dir = "upload/";
           $target_file = $target_dir . basename($_FILES['profileImage']['name']);
            if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target_file))
             {
                echo "<script>alert('Success! Your Uploaded File.')</script>";
            } else {
                echo "";
                echo "<script>alert('Error! file not uploaded, please try again!')</script>";
            }
        }
        //insert sql query
        $sql = "INSERT INTO `emp` (firstName, lastName, email, empPassword, confirmPassword, profileImage, phoneNumber, gender, hobby, country) VALUES 
        ('$firstName', '$lastName', '$email', '$empPassword', '$confirmPassword', '$profileImage', '$phoneNumber', '$gender','$hobby','$country')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Success! Your Data Inserted.')</script>";
        } else {

            echo "<script>alert('Error! Can not insert data.')</script>";
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>