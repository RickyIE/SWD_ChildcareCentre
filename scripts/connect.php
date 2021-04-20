<!-- this file contains information needed to connect to my test database -->
<?PHP
DEFINE('DB_USER', 'meetalex_websiteRoot');
DEFINE('DB_PASSWORD', 'pXZOkNzt}hsIT2WAH+1X*(HGo';
DEFINE('DB_HOST', '50.87.177.72');
DEFINE('DB_NAME', 'meetalex_ChildcareDatabse');
$db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR
die("Could not connect to MySQL! ". mysqli_connect_error());
mysqli_set_charset($db_connection, 'utf8');

?>