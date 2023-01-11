<?php
function redirect_to($new_location)
{
    header("Location:" . $new_location);
    exit;
}
function session()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}