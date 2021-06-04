<?php include("./components/header.inc.php"); ?>
<div class="container-fluid text-light text-center mt-3">
    <div class="row">
        <div class="col-2">
            <a href='./admin-add-stud.php?uid=<?php echo $_GET['uid']; ?>' class="btn btn-primary">Register New Student</a>
        </div>
        <div class="col-9 ">
            <h3>MANAGE STUDENT</h3>
        </div>
        <div class="col-1">
            <a href='./admin-home.php?uid=<?php echo $_GET['uid']; ?>' class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>

<!-- started here -->
<?php
include("./db-config.php");
$display_class_stud = <<<EOT
<center>
    <div class="container bg-light mt-3 p-1">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">PRN</th>
                    <th scope="col">Roll no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Class</th>
                    <th scope="col">Email</th>
                    <th scope="col">View Marks<th>
                    <th scope="col"><b>Update</b><th>
                    <th scope="col"><b>Delete</b></th>
                </tr>
            </thead>
<tbody>
EOT;
echo $display_class_stud;

$sql = "select * from student,class,user_cred where student.roll_no=class.roll_no and student.uid=user_cred.uid;";
$result = mysqli_query($conn, $sql);
if ($result) {

    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {

        $counter = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo   "<tr>";
            echo      "<th scope='row'>" . $counter++ . "</th>";
            echo      "<td>$row[prn]</td>";
            echo      "<td>$row[roll_no]</td>";
            echo      "<td>$row[firstname] $row[lastname]</td>";
            echo      "<td>$row[contact]</td>";
            echo      "<td>$row[gender]</td>";
            echo      "<td>$row[class]</td>";
            echo      "<td>$row[email]</td>";
            echo      "<td>model</td>";
            echo      "<td><a href='./admin-update-stud.php?adminuid=$_GET[uid]' class='btn btn-success'>Update</a></td>";
            echo      "<td><a href='./admin-delete-stud.php?adminuid=$_GET[uid]&prn=$row[prn]&uid=$row[uid]&roll_no=$row[roll_no]' class='btn btn-danger'>Delete</a></td>";
            echo   "</tr>";
        }
    }
}
?>
</tbody>
</table>
</div>
</center>
<?php include("./components/footer.inc.php"); ?>