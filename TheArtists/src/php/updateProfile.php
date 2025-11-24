<!-- Update Profile -->
<?php
session_start();

include("connect.php");
if (!isset($_SESSION['valid'])) {
    header("Location: loginPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Web Application Programming/CSS/updateProfile.css">
    <title>Change Profile</title>
</head>

<body>
    <!-- Name and Logo Songs -->
    <h1 class="name">meloverse</h1>
    <img src="/Web Application Programming/image/loginsignupPage/logodisk.png" alt="" class="logo">

    <!-- PHP -->
    <div class="container">
        <div class="box form-box">
            <?php
            if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phoneno = $_POST['phoneno'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($conn, "UPDATE users SET fName='$fname', lName='$lname', Email='$email', PhoneNo='$phoneno', Password='$password' WHERE Id=$id ") or die("error occurred");

                if ($edit_query) {
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
                    echo "<a href='profilePage.php'><button class='btn'>Go Back To Profile Page</button>";
                }
            } else {

                $id = $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT*FROM users WHERE Id=$id ");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_Fname = $result['fName'];
                    $res_Lname = $result['lName'];
                    $res_Email = $result['Email'];
                    $res_PhoneNo = $result['PhoneNo'];
                    $res_Password = $result['Password'];
                }

            ?>
            
            <!-- Form to edit -->
                <header>Edit Profile</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" value="<?php echo $res_Fname; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" value="<?php echo $res_Lname; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="phoneno">Phone Number</label>
                        <input type="number" name="phoneno" id="phoneno" value="<?php echo $res_PhoneNo; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" value="<?php echo $res_Password; ?>" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" id="submit" class="btn" name="submit" value="Update" required>
                    </div>

                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>