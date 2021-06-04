<?php
include("./db-config.php");
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['contact']) && isset($_POST['gender']) && isset($_POST['class']) && isset($_POST['roll_no']) && isset($_POST['email']) && isset($_POST['password'])) {
    $result = mysqli_query($conn,"insert into student(firstname,lastname,contact,uid,roll_no,gender) value('$_POST[firstname]','$_POST[lastname]',$_POST[contact],null,null,'$_POST[gender]');");

    $result = mysqli_query($conn,"insert into user_cred(email,passcode,usertype) values('$_POST[email]','$_POST[password]',0);");

    $result = mysqli_query($conn, "update student set uid = (select uid from user_cred where email = '$_POST[email]' and passcode = '$_POST[password]') where contact='$_POST[contact]' and firstname='$_POST[firstname]' and lastname='$_POST[lastname]';");

    $result = mysqli_query($conn, "insert into class(class,roll_no) value($_POST[class],$_POST[roll_no]);");

    $result = mysqli_query($conn, "update student set roll_no =$_POST[roll_no] where contact='$_POST[contact]' and firstname='$_POST[firstname]' and lastname='$_POST[lastname]';");
   
    echo "<script>location.href='./admin-student.php?uid=$_GET[uid]'</script>";
} else {
    echo "<script>location.href='./admin-add-stud.php?uid=$_GET[uid]'</script>";
}
