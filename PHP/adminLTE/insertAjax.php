<?php
include "heder.php";
include "sideMenu.php";
include "db_connect.php";


?>

<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crud Operation Using Ajax </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Insert Data </h3>
        </div>
        <form action="" method="POST" id="insert" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">FirstName</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                        placeholder="Enter firstname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">LastName</label>
                    <input type="text" class="form-control" id="lastName" name="lastName"
                        placeholder="Enter lastname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="empPassword" name="empPassword"
                        placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                        placeholder="Enter Confirm Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="profileImage" id="profileImage">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mobile Number</label>
                    <input type="text" class="form-control" id="mobileNumber" name="mobileNumber"
                        placeholder="Enter Mobile Number">
                </div>
                <!-- Gender -->
                <div class="form-check pt-4">
                    <input class="form-check-input" type="radio" name="gender" value="female" id="gender">
                    <label class="form-check-label" for="flexRadioDefault1">
                        female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="male" id="gender">
                    <label class="form-check-label" for="flexRadioDefault2">
                        male
                    </label>
                </div>
                <!-- Hobbby -->
                <div class="form-check pt-4">
                    <input class="form-check-input" type="checkbox" value="Cricket" id="hobby" name="hobby[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        Cricket
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Writing" id="hobby" name="hobby[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        Writing
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Music" id="hobby" name="hobby[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        Music
                    </label>
                </div>
                <!-- Country -->
                <div class="dropdown pt-3 pb-4  ">
                    <label for="country">Choose a country:</label>
                    <select name="country" id="country">
                        <option>Select</option>
                        <option value="India">India</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="France">France</option>
                        <option value="Japan">Japan</option>
                        <option value="Austrelia">Austrelia</option>

                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#submit").click(function() {
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var email = $("#email").val();
            var empPassword = $("#empPassword").val();
            var confirmPassword = $("#confirmPassword").val();
            var profileImage = $_FILES($("#profileImage").val());
            var mobileNumber = $("#mobileNumber").val();
            var gender = $("#gender").val();
            var hobby = implode(',', ("#hobby").val());
            var country = $("#country").val();

            $.ajax({
                url: '',
                method: 'POST',
                data: {

                    firstName: firstName,
                    lastName: lastName,
                    email: email,
                    empPassword: empPassword,
                    confirmPassword: confirmPassword,
                    profileImage: profileImage,
                    mobileNumber: mobileNumber,
                    gender: gender,
                    hobby: hobby,
                    country: country

                },
                success: function(data) {
                    alert(data);
                }
            });
        });
    });

    $(document).ready(function(e) {
        $("#profileImage").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("upload ").html(data);
                },
                error: function(data) {
                    console.log("error");
                    console.log(data);
                }
            });
        }));
    });

    //password validation
    function Validate() {
        var empPassword = document.getElementById("empPassword").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        if (empPassword != confirmPassword) {
            alert("Please enter the same password");
            return false;
        }
        return true;
    }


    $(function() {
  $("#insert").on("sumbit", function(e) {
    e.preventDefault(); 
    var empPassword = $("#empPassword").val(),
    confirmPassword = $("#confirmPassword").val(); 
    if ($.trim(empPassword) === empPassword && 
    empPassword !== "" &&               
    empPassword === confirmPassword) { 
      $.ajax({
        url: "",
        method: "POST",
        data: {
          submit: 'true' 
        },
        success: function(response) {
          var data = JSON && JSON.parse(response) || $.parseJSON(response);
          alert(data);
        }
      });
    }
    else {
      alert("Please enter the same password");
    }
  });
});
</script>
<?php
if (is_array($_FILES)) {

    if (is_uploaded_file($_FILES['profileImage']['tmp_name'])) {
        $sourcePath = $_FILES['profileImage']['tmp_name'];
        $targetPath = "upload/" . $_FILES['profileImage']['name'];
        if (move_uploaded_file($sourcePath, $targetPath)) {

        }
    }
}
?>



<?php
//footer file include
include "footer.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$empPassword = $_POST['empPassword'];
$confirmPassword = $_POST['confirmPassword'];
$profileImage = $_FILES['profileImage']['name'];
$mobileNumber = $_POST['mobileNumber'];
$gender = $_POST['gender'];
$hobby = implode(',', $_POST['hobby']);
$country = $_POST['country'];

// Insert Query
$sql = "INSERT INTO `AjaxCrud` (firstName, lastName, email, empPassword, confirmPassword, profileImage, mobileNumber, gender, hobby, country) 
VALUES ('$firstName', '$lastName', '$email', '$empPassword', ' $confirmPassword','$profileImage', '$mobileNumber', '$gender', '$hobby', '$country')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script> alert('Successful! Insert Your Data.');</script>";
} else {
    echo "<script> alert(failed! please try again!');</script>";
}


?>