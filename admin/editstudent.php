<?php
session_start();
if(isset($_SESSION['username'])){
  require_once "./header.php";
if($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['id'])){
  require_once "../connection.php";
  require_once "../students.php";
  $select = $connection -> prepare('SELECT * FROM students WHERE id=?');
  $select -> execute([$_GET['id']]);
  $select -> setFetchMode(PDO::FETCH_CLASS, 'Student');
  $student = $select -> fetch();
?>
<!-- //////////////////////////////////////////// -->
  <div class="container mt-5 mb-5">
  <h4 class="mb-3">Edit Student</h4>
  <form class="needs-validation card p-4 border-0 shadow rounded-3 " action="../crud/update.php" method="post" novalidate enctype="multipart/form-data">
    <div class="row g-3">
      <div class="col">
      <input type="hidden" name="id" id="id" value="<?= $student->id ?>">
        <label for="student_name" class="form-label">Student name</label>
        <input type="text" class="form-control" id="student_name" placeholder="Student name" pattern="^[a-zA-Z]{2,}$" name="student_name" value="<?= $student -> student_name ?>"  required>
        <div class="invalid-feedback">
          Valid first name is required.
        </div>
      </div>
      <div class="col-12">
        <label for="birth_date" class="form-label">Birth Date </label>
        <input type="date" class="form-control" id="birth_date" name="birth_date" required placeholder="Birth Date" value="<?= $student -> birth_date ?>" >
        <div class="invalid-feedback">
                Please select a valid Date.
              </div>
      </div>
      <div class="col-12">
      <img src="../images/<?= $student -> stu_img ?>"  width="30%" height="225">
      <br>
        <label for="student_img" class="form-label">Student img</label>
        <input type="file" class="form-control" id="student_img" name="student_img" placeholder="Birth Date" value="../images/<?= $student -> stu_img ?>">
      </div>
<!-- ////////////////////////////////////////////////////////////////////////// -->
      <div class="col-md-5">
        <label for="courses" class="form-label">Courses</label>
        <select class="form-select" id="courses" name="courses"  required>
        <?php
switch ($student -> courses) {
  case "CSS":
    ?>
        <option value="<?= $student -> courses ?>" selected><?= $student -> courses ?></option>
          <option value="HTML">HTML</option>
          <option value="PHP">PHP</option>
            <?php
    break;
  case "HTML":
    ?>
          <option value="CSS">CSS</option>
          <option value="<?= $student -> courses ?>" selected><?= $student -> courses ?></option>
          <option value="PHP">PHP</option>
        <?php
    break;
  case "PHP":
    ?>
          <option value="CSS">CSS</option>
          <option value="HTML">HTML</option>
          <option value="<?= $student -> courses ?>" selected><?= $student -> courses ?></option>
        <?php
    break;
}
?>

        </select>
        <div class="invalid-feedback">
          Please select a valid country.
        </div>
      </div>

    </div>

    <hr class="my-4">


    <h4 class="mb-3">Student status</h4>
<!-- ////////////////////////////////////////// swich case  ///////////////////////////////////////// -->

    <div class="my-3">

    <?php
switch ($student -> student_status) {
  case "Avilable":
    ?>
    <div class="form-check">
        <input id="Avilable" name="statusMethod" type="radio" class="form-check-input" value="Avilable" checked value="<?= $student -> student_status ?>" checked required>
        <label class="form-check-label" for="Avilable"><?= $student -> student_status ?></label>
        </div>
        <div class="form-check">
        <input id="NotAvilable" name="statusMethod" type="radio" class="form-check-input" value="Not Avilable"  required>
        <label class="form-check-label" for="NotAvilable">Not Avilable</label>
      </div>
            <?php
    break;
  case "Not Avilable":
    ?>
        <div class="form-check">
        <input id="Avilable" name="statusMethod" type="radio" class="form-check-input" value="Avilable"    required>
        <label class="form-check-label" for="Avilable">Avilable</label>
      </div>
    <div class="form-check">
    <input id="Avilable" name="statusMethod" type="radio" class="form-check-input" value="Avilable" checked value="<?= $student -> student_status ?>" checked required>
    <label class="form-check-label" for="Avilable"><?= $student -> student_status ?></label>
    </div>
        <?php
    break;
}
?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////// -->


    <hr class="my-4">

    <button class="w-100 btn btn-primary btn-lg" type="submit">Apdate</button>
  </form>
</div>
<!-- ////////////////////////////////////////////////////////////////////// -->
<?php


}
require_once "./footer.php";
}else{
  header("Location: login.php");
}
?>