<?php 

$title = 'Suspending User';
require_once 'components/header.php';
require_once 'components/auth_check.php'; 
require_once 'db/conn.php'
?>

<?php 
if(!isset($_GET['id']))
{
    echo "bir sıkıntı var";
    
} 
else
{
    $id = $_GET['id'];
    $day = $_POST['day'];
    echo $id." day count:". $day;
    try{
        $sql_statement = "UPDATE Users SET Users.bannedUntil = current_date(), Users.bannedUntil = DATE_ADD(Users.bannedUntil , INTERVAL :day DAY), Users.isActive = 0 WHERE Users.uID =:id;";
        $stmt = $pdo->prepare($sql_statement);
        $stmt->bindparam(':id', $id);
        $stmt->bindparam(':day', $day);
        $stmt->execute();
        echo $id . " user suspended"  . "<br>";
    }
    catch (PDOException $e){
        echo "Something went wrong"  . "<br>";
    }
    header ("Location: admin.php");
}
?>




<?php require_once 'components/footer.php'; ?> 