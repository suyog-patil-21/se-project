<?php include("./components/header.inc.php"); ?>
<div class="container text-light align-center mt-3">
    <div class="col-lg-4">
        <?php
        echo "<h2>STUDENT ROLL NO : $_GET[roll_no]</h2>";
        ?>
        <h3> Enter marks in the Field</h3>
        <form action="./marks-redirect.php?uid=<?php echo $_GET['uid']; ?>&roll_no=<?php echo $_GET['roll_no']; ?>" method="post">
            MATHEMATICS:
            <input type="number" class="form-control" placeholder="Enter Marks" min="0" max="100" name="maths">
            SCIENCE:
            <input type="number" class="form-control" placeholder="Enter Marks" min="0" max="100" name="science">
            SOCIAL STUDIES:
            <input type="number" class="form-control" placeholder="Enter Marks" min="0" max="100" name="sst">
            ENGLISH:
            <input type="number" class="form-control" placeholder="Enter Marks" min="0" max="100" name="english">
            HINDI:
            <input type="number" class="form-control" placeholder="Enter Marks" min="0" max="100" name="hindi">
            <button class='btn btn-warning m-3' type='submit'>Update Marks</button>
        </form>
    </div>
</div>

<?php
echo "<a href='http://localhost/se-pbl-dbms-project/faculty-home.php?uid=$_GET[uid]' class='btn btn-primary m-3'>Go Back</a>";
?>
<?php include("./components/footer.inc.php"); ?>