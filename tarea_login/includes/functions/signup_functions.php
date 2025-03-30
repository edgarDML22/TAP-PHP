<?php
function show_error_or_success_message() {
    if (isset($_SESSION['error_message'])) {
        echo "<p style='color: red;'>" . $_SESSION['error_message'] . "</p>";
        unset($_SESSION['error_message']);
    }
    // Mostrar el mensaje de éxito si existe
    if (isset($_SESSION['success_message'])) {
        echo "<p style='color: green;'>" . $_SESSION['success_message'] . "</p>";
        unset($_SESSION['success_message']);
    }
}

function old_value($key) {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : '';
}

function clear_session_values() {
    unset($_SESSION['signup_name']);
    unset($_SESSION['signup_lastname']);
    unset($_SESSION['signup_username']);
}
?>