<?php
// if(isset($_POST["submit"])){
// echo "path :". __DIR__;
if (isset($_POST["username"]) && isset($_POST["userpass"])) {
    $username = $_POST["username"];
    $userpass = $_POST["userpass"];
    $usertype = "";
    include("./db-config.php");
    $sql = "select uid,usertype from user_cred where email='$username' and passcode='$userpass';";
    $result = mysqli_query($conn, $sql);
    echo "inside code<br>";

    if ($result) {
        echo "success<br>";
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            $row = mysqli_fetch_assoc($result);
            $usertype = $row["usertype"];
            $uid = $row["uid"];
            if ($usertype == '1') { // checks usertype student or faculty 
                $result = mysqli_query($conn,"select * from faculty where uid=$uid;");
                if ($result) {
                    echo "inside 2<br>";
                    $numRows = mysqli_num_rows($result);
                    echo "rows insidethe faculty statment ". $numRows;
                    if ($numRows > 0) {
                    echo "inside 3<br>";
                        $row = mysqli_fetch_assoc($result);
                        $superuser = $row["issuperuser"];
                        if ($superuser == '1') {
                            echo "<script>location.href='./admin-home.php?uid=$uid'</script>";
                        } else {
                            echo "<script>location.href='./faculty-home.php?uid=$uid'</script>";
                        }
                    }
                }
            } else {
                echo "<script>location.href='./student-home.php?uid=$uid'</script>";
            }
        } else {
            echo "<script>location.href='./index.php'</script>";
        }
    } else {
        echo "Database connects ERROR :";
        echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
