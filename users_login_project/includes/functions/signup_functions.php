<?php
function show_error_or_success_message() {
    if (isset($_SESSION['error_message'])) {
        echo "<div class='error-message'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
    if (isset($_SESSION['success_message'])) {
        echo "<div class='success-message'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']);
    }
}

function old_value($key) {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : '';
}

function clear_session_values($keys) {
    foreach ($keys as $key) {
        unset($_SESSION[$key]);
    }
}
?>