<?php

require('database/DBController.php');
//require product class
//
require('database/LoginController.php');
//
//require('./database/Cart.php');
//DBCONTROLLER OBJECT
$db=new DBController();

$login=new LoginController($db,$db->conn);
//
//$cart=new Cart($db);