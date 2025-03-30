<?php
session_start();
include 'includes/functions/signup_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="assets/js/signup.js"></script>
</head>
<body>
    <h1>SIGN UP</h1>
    <?php show_error_or_success_message()?>

    <form action="includes/controllers/signup_controller.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo old_value('signup_name'); ?>" placeholder="Name" required >
        <br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo old_value('signup_lastname'); ?>" placeholder="Last name" required>
        <br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo old_value('signup_username'); ?>" placeholder="Username" required>
        <br><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" placeholder="Password" required>
        <br><br>

        <label for="confirm_pass">Confirm Password:</label>
        <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm your password" required>
        <br><br>

        <button type="submit">Sign Up</button>
    </form>

    <?php clear_session_values()?>

</body>
</html>