<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function MessageBoxDelete($msg)
{
    echo "
    <script type='text/javascript'>
        alert('$msg');
        history.go(-1);
    </script>";
}
?>