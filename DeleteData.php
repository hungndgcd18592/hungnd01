<!DOCTYPE html>
<html>
<body>

<h1>INSERT DATA TO DATABASE</h1>

<?php
ini_set('display_errors', 1);
echo "Delete database!";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
       "host=
ec2-52-200-119-0.compute-1.amazonaws.com
;port=5432;user=bsoftcnuneszmg;password=ffbf603a129cbdd6304c87386df81eb4272cb0c072f9428830572eef6df2a663;dbname=d8ialp45a8u6p6",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "DELETE FROM product WHERE ProductID = '01'";
$stmt = $pdo->prepare($sql);
if($stmt->execute() == TRUE){
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: ";
}

?>
</body>
</html>
