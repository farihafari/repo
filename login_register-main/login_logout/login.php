<!doctype html>
<html lang="en">

<head>
    <?php
    include 'links.php';
    ?>
    <title>Login Page</title>
</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mb-4" id="email" placeholder="Enter email" name="email">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control mb-4" id="password" placeholder="Enter password" name="password">
            </div>

            <button class="btn btn-primary mb-3" name="submit">Login</button>
            <p>Already have a account? <a href="register.php" style="text-decoration: none;">Sign Up</a></p>

        </form>
    </div>
</body>

</html>

<?php
include 'connection.php';

session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_check_query = "select * from register_data where email = '$email'";
    $result = mysqli_query($conn, $email_check_query);

    $email_count = mysqli_num_rows($result);

    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($result);
        $dbpass = $email_pass['password'];
        $_SESSION['username'] = $email_pass['username'];

        $password_decode = password_verify($password, $dbpass);

        if ($password_decode) {
            header('location: dashboard.php');
        } else {
?>
            <script>
                alert('Password is incorrect');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('Email is invalid');
        </script>
<?php
    }
}
?>