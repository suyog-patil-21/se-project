<?php 
include('./db-config.php');
if(isset($_GET['uid'])&& isset($_GET['prn'])&&  isset($_GET['roll_no'])){
    $result=mysqli_query($conn,"delete from student where prn=$_GET[prn];");
    $result=mysqli_query($conn,"delete from class where roll_no=$_GET[roll_no];");
    $result=mysqli_query($conn,"delete from user_cred where uid=$_GET[uid];");
    $result=mysqli_query($conn,"delete from marks where roll_no=$_GET[roll_no];");

    echo "<script>location.href='./admin-student.php?uid=$_GET[adminuid]'</script>";
}
else{
    echo "<script>location.href='./admin-student.php?uid=$_GET[adminuid]'</script>";
}
?>
