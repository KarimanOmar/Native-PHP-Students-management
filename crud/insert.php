<?php
//connect to db
session_start();
require_once "connection.php";
if(!empty($_SESSION['username'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $studentName = $_POST['student_name'];
        $birthDate = $_POST['birth_date'];
        $courses = $_POST['courses'];
        $statusMethod = $_POST['statusMethod'];
        $studentImg = $_FILES['student_img'];
        $namePattern = "/^[a-z]{2,}[' ']*[a-z]{2,}$/i";
        if(isset($studentName, $birthDate, $courses, $statusMethod)){
            if(!empty($studentImg)){
                $fileName = $studentImg['name'];
                $fileTemp = $studentImg['tmp_name'];
                $explode = explode('.',$fileName);
                $fileExt = end($explode);
                $allowedExt = ['jpg', 'png', 'jpeg' , 'JPG', 'PNG', 'JPEG'];

                if(in_array($fileExt, $allowedExt) && preg_match($namePattern, $studentName)){
                    move_uploaded_file($fileTemp, '../images/'.$fileName);
                    $insert = $connection -> prepare('INSERT INTO students (student_name,courses,student_status,birth_date,stu_img) VALUES (?,?,?,?,?)');
                    $insert -> execute([$studentName, $courses, $statusMethod, $birthDate, $fileName]);
                    header("Location: ../admin/index.php");
                }else{
                    echo "<center><span style='color: darkred;'>Not allowed to upload that file</span></center>"."<a class='btn btn-lg btn-primary' href='../admin/index.php' role='button'>Go Back &raquo;</a>";
                    
                }

            }else{
                header("Location: ../admin/index.php");
            }
        }else{
            header("Location: ../admin/index.php");
        }
    }else{
        header("Location: ../admin/index.php");
    }
}else{
    header("Location: ../admin/login.php");
}
?>