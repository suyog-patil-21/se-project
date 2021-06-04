<?php
include("./db-config.php");
if(isset($_POST['maths']) && isset($_POST['science'])&&isset($_POST['sst']) && isset($_POST['english'])&&isset($_POST['hindi'])){
    $result = mysqli_query($conn,"update marks set marks=$_POST[maths] where roll_no=$_GET[roll_no] and subjectname='maths';");
    $result = mysqli_query($conn,"update marks set marks=$_POST[science] where roll_no=$_GET[roll_no] and subjectname='science';");
    $result = mysqli_query($conn,"update marks set marks=$_POST[sst] where roll_no=$_GET[roll_no] and subjectname='sst';");
    $result = mysqli_query($conn,"update marks set marks=$_POST[english] where roll_no=$_GET[roll_no] and subjectname='english';");
    $result = mysqli_query($conn,"update marks set marks=$_POST[hindi] where roll_no=$_GET[roll_no] and subjectname='hindi';");
    echo "<script>location.href='http://localhost/se-pbl-dbms-project/faculty-home.php?uid=$_GET[uid]'</script>";
}
else{
echo "<script>location.href='http://localhost/se-pbl-dbms-project/fact-edit-mark.php?uid=$_GET[uid]&$_GET[roll_no]'</script>";
}
