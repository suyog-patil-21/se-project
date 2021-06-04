<?php include("./components/header.inc.php"); ?>
<div class="container-fluid text-light text-center mt-3">
    <div class="row">
        <div class="col-11 ">
            <h3>Register New Student</h3>
        </div>
        <div class="col-1">
            <a href='./admin-student.php?uid=<?php echo $_GET['uid']; ?>' class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>

<div class="container text-light pt-2">
    <form action="./register-student.php?uid=<?php echo $_GET['uid']; ?>" method="post">
        <div class="row p-2">
            <div class="col-3">
                First Name:
                <input type="text" class="form-control" placeholder="Enter Firstname" name="firstname" required>
            </div>
            <div class="col-3">
                Last Name:
                <input type="text" class="form-control" placeholder="Enter Firstname" name="lastname" required>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-3">
                Contact:
                <input type="number" class="form-control" placeholder="Enter contact" min="0" max="9999999999" name="contact" required>
            </div>
            <div class="col-2">
                Class:
                <input type="number" class="form-control" placeholder="Enter class" min="1" max="10" name="class" required>
            </div>
            <div class="col-2">
                Roll No:
                <input type="number" class="form-control" placeholder="Enter Roll" min="101" name="roll_no" required>
            </div>
        </div>
        <div class="row">
            <p>Gender : </p>
            <div class="col-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required>
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
            </div>

            <div class="col-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
            </div>

            <div class="col-1">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="other">
                    <label class="form-check-label" for="inlineRadio3">Other</label>
                </div>
            </div>


        </div>

        <h6 class="p-2"> Login Details :</h6>
        <div class="row p-1">
            <div class="col">
                <div class="col-4">
                    Email :
                    <input type="email" class="form-control" placeholder="Enter Email" name="email"required>
                    <p>This email will be your Login Credintial</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-4">
                    Password :
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                </div>
            </div>
        </div>

        <button type="submit" class='btn btn-success m-3'>Add Student</button>
        <button type="reset" class='btn btn-warning m-3'>Reset</button>
    </form>
</div>

<?php include("./components/footer.inc.php"); ?>