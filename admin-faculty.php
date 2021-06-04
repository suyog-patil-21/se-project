<?php include("./components/header.inc.php");
?>
<div class="container-fluid text-light text-center mt-3">
    <div class="row">
        <div class="col-2">
            <a href='./admin-add-fact.php?uid=<?php echo $_GET['uid']; ?>' class="btn btn-primary">Register New Faculty</a>
        </div>
        <div class="col-9 ">
            <h3>MANAGE FACULTY</h3>
        </div>
        <div class="col-1">
            <a href='./admin-home.php?uid=<?php echo $_GET['uid']; ?>' class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>

<!-- started here -->
<?php
include("./db-config.php");
$display_class_fact = <<<EOT
<center>
    <div class="container bg-light mt-3 p-1">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Faculty ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Class Teacher</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin<th>
                    <th scope="col"><b>Update</b><th>
                    <th scope="col"><b>Delete</b></th>
                </tr>
            </thead>
<tbody>
EOT;
echo $display_class_fact;

$sql = "select * from faculty,user_cred where faculty.uid=user_cred.uid;";
$result = mysqli_query($conn, $sql);
if ($result) {

    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {

        $counter = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo   "<tr>";
            echo      "<th scope='row'>" . $counter++ . "</th>";
            echo      "<td>$row[fid]</td>";
            echo      "<td>$row[firstname] $row[lastname]</td>";
            echo      "<td>$row[contact]</td>";
            echo      "<td>$row[gender]</td>";
            echo      "<td>$row[classteacher]</td>";
            echo      "<td>$row[email]</td>";
            if ($row['issuperuser'] == '1') {
                echo "<td>Yes</td>";
            } else {
                echo "<td>No</td>";
            }
            echo      "<td><a href='http://localhost/se-pbl-dbms-project/admin-update-fact.php?adminuid=$_GET[uid]' class='btn btn-success'>Update</a></td>";
            echo      "<td><a href='http://localhost/se-pbl-dbms-project/admin-delete-fact.php?adminuid=$_GET[uid]' class='btn btn-danger'>Delete</a></td>";
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