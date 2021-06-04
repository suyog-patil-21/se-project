<?php include("./components/header.inc.php"); ?>
<div class="container-fluid text-light text-center mt-3">
    <h3>ADMIN HOME PAGE</3>
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
<div class="container p-3 mt-3">
    <div class="card">
        <div class="card-header">FACULTY PROFILE</div>
        <div class="card-body">
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
    </div>
</div>

<br>
EOT;
echo $displayfact_info;
?>

<div class="container ">
    <div class="row">
        <div class="col-4">
            <div class="card ">
                <div class="card-header">
                    STUDENT INFORMATION
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Special title treatment</h5> -->
                    <p class="card-text">Manage Students.</p>
                    <a href="./admin-student.php?uid=<?php echo $_GET['uid']; ?>" class="btn btn-primary">STUDENT</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card ">
                <div class="card-header">
                    FACULTY INFORMATION
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Special title treatment</h5> -->
                    <p class="card-text">Manage Faculty.</p>
                    <a href="./admin-faculty.php?uid=<?php echo $_GET['uid']; ?>" class="btn btn-primary">FACULTY</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("./components/footer.inc.php"); ?>