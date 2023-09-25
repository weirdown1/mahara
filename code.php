<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $month = mysqli_real_escape_string($con, $_POST['month']);
    $stdate = mysqli_real_escape_string($con, $_POST['stdate']);
    $payment = mysqli_real_escape_string($con, $_POST['payment']);
    $idmonth = mysqli_real_escape_string($con, $_POST['monthid']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);
    $query2 = "UPDATE month SET  course='$course' ,monthname='$month',payement='$payment' WHERE idmonth='$idmonth' ";
    $query_run2=mysqli_query($con, $query2);
    if (!$query_run2) {
        die("Query failed: " . mysqli_error($con));
    }
    if($query_run && $query_run2)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    
    

    $query = "INSERT INTO students (name,email,phone) VALUES ('$name','$email','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: ind.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: ind.php");
        exit(0);
    }
}


if(isset($_POST['save_month']))
{
    $month = mysqli_real_escape_string($con, $_POST['month']);
    $stdate = mysqli_real_escape_string($con, $_POST['stdate']);
    $payment = mysqli_real_escape_string($con, $_POST['payment']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $id = mysqli_real_escape_string($con, $_POST['id']);
    

    $query = "INSERT INTO month (monthname,payement,date,course) VALUES ('$month','$payment','$stdate','$course')";
    
    $query_run = mysqli_query($con, $query);
    
    
    

    if($query_run)
    {
        
            // Get the last inserted ID
            $lastID = mysqli_insert_id($con);
            $query = "INSERT INTO monthstud (ids,idm) VALUES ('$id','$lastID')";
            $query_run = mysqli_query($con, $query);
            if (!$query_run) {
                die("Query failed: " . mysqli_error($con));
            }

   /* $query_run = mysqli_query($con, $query);
    if($query_run)
    {*/
        $_SESSION['message'] = "payement Created Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "payementt Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}
?>