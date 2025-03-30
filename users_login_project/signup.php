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
    <link rel="stylesheet" href="assets/styles/style_signup.css">
</head>
<body>
    <div class="signup-container">
        <h1>SIGN UP</h1>
        <?php if (isset($_SESSION['error_message']) || isset($_SESSION['success_message'])): ?>
            <?php show_error_or_success_message(); ?>
        <?php endif; ?>

        <form action="includes/controllers/signup_controller.php" method="post">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo old_value('signup_name'); ?>" placeholder="Name" required>
            </div>

            <div class="input-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo old_value('signup_lastname'); ?>" placeholder="Last name" required>
            </div>

            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo old_value('signup_username'); ?>" placeholder="Username" required>
            </div>

            <div class="input-group">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" placeholder="Password" required>
            </div>

            <div class="input-group">
                <label for="confirm_pass">Confirm Password:</label>
                <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm your password" required>
            </div>

            <button type="submit" class="signup-button">Sign Up</button>
        </form>
    </div>

    <?php clear_session_values(['signup_name', 'signup_lastname', 'signup_username']); ?>
</body>
</html>