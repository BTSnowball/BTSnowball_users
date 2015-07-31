<?php
function showMessage($message = 'success') {
    echo $message;
    exit();
}
showMessage();