<?php ob_start();

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);

$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


/*$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="shop";


foreach ($db as $key => $value) {
	define(strtoupper($key),$value);
}

$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);*/
?>