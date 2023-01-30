<!doctype html>
<html lang="en">

<head>
    <?php
    include 'links.php';
    ?>
    <title>Register Page</title>
</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <!-- Username -->
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control mb-4" id="username" placeholder="Enter username" name="username">
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mb-4" id="email" placeholder="Enter email" name="email">
            </div>
            <!-- Mobile -->
            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control mb-4" id="phone" placeholder="Enter phone" name="phone">
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control mb-4" id="password" placeholder="Enter password" name="password">
            </div>
            <!-- Confirm password -->
            <div class="form-group">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control mb-4" id="cpassword" placeholder="Enter password again" name="cpassword">
            </div>

            <button class="btn btn-primary mb-3" name="submit">Register</button>
            <p>Already have a account? <a href="login.php" style="text-decoration: none;">Log In</a></p>

        </form>
    </div>
</body>

</html>


<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['cpassword'];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $password_confirm_hash = password_hash($confirm_password, PASSWORD_BCRYPT);

    $email_check_query = "select * from register_data where email = '$email'";
    $result = mysqli_query($conn, $email_check_query);

    $email_count = mysqli_num_rows($result);

    if ($email_count > 0) {
?>
        <script>
            alert('Email already exists');
        </script>
        <?php
    } else {
        if ($password === $confirm_password) {
            $insert_query = "insert into register_data(username, email, phone, password, cpassword)
            values('$username', '$email', '$phone', '$password_hash', '$password_confirm_hash')";

            $result = mysqli_query($conn, $insert_query);

            if ($result) {
        ?>
                <script>
                    alert('Registered Successfully');
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('There was a problem while registering the user');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Password does not match');
            </script>
<?php
        }
    }
}
?>