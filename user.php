<?php
session_start();

// Check if the unique_id is set in the session
if (isset($_SESSION['unique_id'])) {
    // Retrieve the unique_id value
    $unique_id = $_SESSION['unique_id'];

    // Now you can use $unique_id in your code
    echo "Unique ID: $unique_id";
} 
?>