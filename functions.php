<?php
$config = include './config.php';

require './app/auth.php';
require './app/helpers.php';
require './app/crud.php';



deleteById($_REQUEST);
seed($_REQUEST);

