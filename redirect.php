<?php
require_once('lib.php');

header('HTTP/1.1 301 Moved Permanently');
header('Location: https://twitter.com/_/status/' . b60to10($_GET['short']));
