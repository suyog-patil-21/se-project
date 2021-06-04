<?php
include("./components/header.inc.php");
?>
<div class="container-fluid text-center mt-3 text-light">
    <h3>STUDENT HOME PAGE</H3>
</div>


<div class="container-fluid content-center text-center">
    <?php
    include("./db-config.php");
    $roll_no = '';
    $firstname = '';
    $lastname = '';
    $gender = '';
    $contact = '';
    $sql = "select * from student where uid=$_GET[uid];";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            $row = mysqli_fetch_assoc($result);
            $roll_no = $row['roll_no'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $gender = $row['gender'];
            $contact = $row['contact'];
        }
    }

    $display_info = <<<EOT
    <div class="container-fluid text-center text-light">
    <b>Student Details
        <div class="container m-4">
            <div class="row">
                <div class="col-sm">
                    Name : $firstname $lastname
                </div>
                <div class="col-sm">
                    Contact : $contact
                </div>
                <div class="col-sm">
                    Roll no : $roll_no
                </div>
                <div class="col-sm">
                    Gender : $gender
                </div>
            </div>
        </div>
    </b>
    </div>
    EOT;
    echo $display_info;


    $marklist = array();
    $sql = "select * from marks where roll_no=$roll_no;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($marklist, $row['marks']);
            }
        }
    }

    $display_result = <<<EOT
    <h4 class="text-light">RESULT</h4>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <!-- Card Content start from here -->
                <div class="card">
                    <div class="card-header">
                        MATHEMATICS
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">$marklist[0]</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <!-- Card Content start from here -->
                <div class="card">
                    <div class="card-header">
                        SCIENCE
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">$marklist[1]</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <!-- Card Content start from here -->
                <div class="card">
                    <div class="card-header">
                        SOCIAL STUDIES
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">$marklist[2]</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <!-- Card Content start from here -->
                <div class="card">
                    <div class="card-header">
                        ENGLISH
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">$marklist[3]</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <!-- Card Content start from here -->
                <div class="card">
                    <div class="card-header">
                        HINDI
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">$marklist[4]</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    EOT;
    echo $display_result;

    ?>
</div>

<?php include("./components/footer.inc.php"); ?>