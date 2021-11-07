<?php
function redirect($url)
{
    header("Location: $url");
    exit();
}
redirect('./web/index.html');
?>