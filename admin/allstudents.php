<?php 
if(isset($_SESSION['username'])){
?>
<h2>All Students</h2>
<br>
      <div class="table-responsive card p-4 border-0 shadow rounded-3">
        <table class="table table-striped table-sm ">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Student Name</th>
              <th scope="col">Birth Date</th>
              <th scope="col">Courses</th>
              <th scope="col">Student Status</th>
              <th scope="col">Student Photo</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
        require_once "../connection.php";
        require_once "../students.php";
        $select = $connection -> prepare('SELECT * FROM students');
        $select -> execute();
        $students = $select -> fetchAll(PDO::FETCH_CLASS, 'Student');
        foreach($students as $student){
        ?>
            <tr>
              <td><?= $student -> id ; ?></td>
              <td><?= $student -> student_name; ?></td>
              <td><?= $student -> birth_date; ?></td>
              <td><?= $student -> courses; ?></td>
              <td><?= $student -> student_status; ?></td>
              <td><img src="../images/<?= $student -> stu_img ?>" class="card-img-top"  width="2%" height="60"></td>
              <td>
                  <a href="../crud/delete.php?id=<?= $student -> id ?>">
                  <i class="bi bi-trash"></i>
            </a>
              <a href="editstudent.php?id=<?= $student -> id ?>">
            <i class="bi bi-pencil-square"></i>
            </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <?php
}else{
  header("Location: login.php");
}
?>