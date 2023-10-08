<?php 
if(isset($_SESSION['username'])){
?>
<div class="col-md-7 col-lg-8 mb-5">
        <h4 class="mb-3">Add Students</h4>
        <form class="needs-validation card p-4 border-0 shadow rounded-3" action="../crud/insert.php" method="post" novalidate enctype="multipart/form-data" style="background-color:#fff;">
          <div class="row g-3">
            <div class="col">
              <label for="student_name" class="form-label">Student name</label>
              <input type="text" class="form-control" id="student_name" placeholder="Student name" name="student_name"  required pattern="^[a-zA-Z]{2,}$">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-12">
              <label for="birth_date" class="form-label">Birth Date </label>
              <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Birth Date" required>
              <div class="invalid-feedback">
                Please select a valid Date.
              </div>
            </div>
            <div class="col-12">
              <label for="student_img" class="form-label">Student img</label>
              <input type="file" class="form-control" id="student_img" name="student_img" placeholder="Birth Date">
            </div>

            <div class="col-md-5">
              <label for="courses" class="form-label">Courses</label>
              <select class="form-select" id="courses" name="courses" required>
                <option value="CSS">CSS</option>
                <option value="HTML">HTML</option>
                <option value="PHP">PHP</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Course.
              </div>
            </div>

          </div>

          <hr class="my-4">


          <h4 class="mb-3"> Student status</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="Avilable" name="statusMethod" type="radio" class="form-check-input" value="Avilable" checked required>
              <label class="form-check-label" for="Avilable">Avilable</label>
            </div>
            <div class="form-check">
              <input id="NotAvilable" name="statusMethod" type="radio" class="form-check-input" value="Not Avilable" required>
              <label class="form-check-label" for="NotAvilable">Not Avilable</label>
            </div>
          </div>



          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Add</button>
        </form>
      </div>
      <?php
}else{
  header("Location: login.php");
}
?>