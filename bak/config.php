<?php
require("conf/options.php");  //database configuration files
/////////////////////////////////////////////////////////////
// Please note that if you get any errors when connecting, //
// that you will need to email your host as we cannot tell //
// you what your specific values are supposed to be        //
/////////////////////////////////////////////////////////////

// type of database running
// (only mysql is supported at the moment)
$dbservertype='mysql';

// hostname or ip of server
$servername=$dbservername;

// username and password to log onto db server
$dbusername=$dbusername;
$dbpassword=$dbuserpass;

// name of database
$dbname=$dbname;

// technical email address - any error messages will be emailed here
$technicalemail='zhugexubin@163.com';

// use persistent connections to the database
// 0 = don't use
// 1 = use
$usepconnect=0;

?>