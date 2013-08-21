<?php
if (file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
    return FALSE;
}

require $_SERVER['DOCUMENT_ROOT'] . '/index.php';
