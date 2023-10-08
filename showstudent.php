<?php
  require_once "./template/header.php";
if($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['id'])){
  require_once "connection.php";
  require_once "students.php";
  $select = $connection -> prepare('SELECT * FROM students WHERE id=?');
  $select -> execute([$_GET['id']]);
  $select -> setFetchMode(PDO::FETCH_CLASS, 'Student');
  $student = $select -> fetch();
?>
<!-- //////////////////////////////////////////// -->
<hr>
<h1 class="text-center mt-5 mb-5  pt-3 pb-3 " style="background-color: coral;" >Student Details</h1>
<main class="container text-center ">
  <div class=" p-5 rounded mb-5  card p-4 border-0 shadow rounded-3">
  <h5>Student img:</h5>
  <br>
  <img class="rounded mx-auto d-block"  src="./images/<?= $student -> stu_img ?>"  width="30%" height="225">
  <br>
  <br>
    <h5>Student id:</h5>
    <p class="lead">
    <?= $student->id ?>
    </p>
    <h5>Student name:</h5>
    <p class="lead">
    <?= $student -> student_name ?>
    </p>
    <h5>Birth Date:</h5>
    <p class="lead">
    <?= $student -> birth_date ?>
    </p>
    <h5>Student Courses:</h5>
    <p class="lead">
    <?= $student -> courses ?>
    </p>
    <h5>Student status:</h5>
    <p class="lead">
    <?= $student -> student_status ?>    </p>
    <a class="btn btn-lg btn-primary" href="./index.php" role="button">Go Back &raquo;</a>
  </div>
</main>

<?php
}
require_once "./template/footer.php";
?>