<?php
include_once "base62.php";

$code =  Base62::encode(123);
echo $code;
echo "\n";
echo Base62::decode($code);
echo "\n";
