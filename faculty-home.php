<?php include("./components/header.inc.php"); ?>
<div class="container-fluid text-center text-light mt-3">
    <h3>FACULTY HOME PAGE</3>
</div>


<?php
include("./db-config.php");
$faculty_id = '';
$firstname = '';
$lastname = '';
$gender = '';
$contact = '';
$classteacher = '';
$isAdmin = '';

$sql = "select * from faculty where uid=$_GET[uid];";
$result = mysqli_query($conn, $sql);

if ($result) {

    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {

        $row = mysqli_fetch_assoc($result);
        $faculty_id = $row['fid'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $gender = $row['gender'];
        $contact = $row['contact'];
        $classteacher = $row['classteacher'];
        if ($row['issuperuser'] == '1') {
            $isAdmin = 'Yes';
        } else {
            $isAdmin = 'No';
        }
    }
}

$displayfact_info = <<<EOT
<div class="container bg-light p-3 mt-3">
    <h3> Faculty Information</h3>
    <hr>
    <div class="row p-2">
        <div class="col">
            Name : $firstname $lastname
        </div>
        <div class="col">
            Contact : $contact
        </div>
        <div class="col">
            Gender : $gender
        </div>
    </div>
    <div class="row p-2">
        <div class="col">
            Class teacher of standard : $classteacher
        </div>
        <div class="col">
            Admin User: $isAdmin
        </div>
        <div class="col">
            Faculty ID : $faculty_id
        </div>
    </div>
</div>
<br>
<br>
EOT;
echo $displayfact_info;




$display_class_stud = <<<EOT
<center>
    <div class="container bg-light mt-3 p-1">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">PRN</th>
                    <th scope="col">Roll no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">gender</th>
                    <th scope="col">Enter Marks</th>
                </tr>
            </thead>
<tbody>
EOT;
echo $display_class_stud;

$sql = "select * from student,class where student.roll_no=class.roll_no and class=$classteacher;";
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
            echo      "<td><a href='http://localhost/se-pbl-dbms-project/fact-edit-mark.php?uid=$_GET[uid]&roll_no=$row[roll_no]' class='btn btn-success'>Input</a></td>";
            echo   "</tr>";
        }
    }
}
?>
</tbody>
</table>
</div>
</center>
<!-- Display the Class teacher her students -->

<?php include("./components/footer.inc.php"); ?>