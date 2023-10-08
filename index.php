<?php 
require_once "./template/header.php";
?>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
        require_once "./connection.php";
        require_once "./students.php";
        $select = $connection -> prepare('SELECT * FROM students');
        $select -> execute();
        $students = $select -> fetchAll(PDO::FETCH_CLASS, 'Student');
        foreach($students as $student){
        ?>
        <div class="col">
          <div class="card card p-4 border-0 shadow rounded-3">
          <img src="./images/<?= $student -> stu_img ?>" class="card-img-top"  width="100%" height="225">
            <div class="card-body">
            <h5 class="card-title"><?= $student -> id ; ?></h5>
                <p class="card-text"><?= $student -> student_name; ?></p>
                <p class="card-text"><?= $student -> courses; ?></p>
                <p class="card-text"><?= $student -> student_status; ?></p>
                <p class="card-text"><?= $student -> birth_date; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                <a href="showstudent.php?id=<?= $student -> id ?>">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                </a>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php
require_once "./template/footer.php";
?>