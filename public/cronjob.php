<?PHP
$host = "localhost";
$user = "root";
$passwd = "";
$database = "cthoreca";
$conn = mysqli_connect($host, $user, $passwd, $database) or die ('Error: '. mysqli_error($conn));


$date = date("Y/m/d G:i:s", strtotime('-14 days'));
$query = "DELETE FRO bM `visitors` WHERE `visitors`.`created_at` < '$date'";

mysqli_query($conn, $query);

