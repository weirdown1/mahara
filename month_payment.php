<?php  
  
 require 'dbcon.php';
?> 
<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>month payment</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Month payment 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            
                            
                            <div class="mb-3">
                            <label for="month">Month:</label>

<select name="month" id="month-select" class="form-control">
  <option value="">--Please choose a month--</option>
  <option value="january">january</option>
  <option value="february">february </option>
  <option value="mars">mars</option>
  <option value="april">april</option>
  <option value="mai">mai</option>
  <option value="june">june</option>
  <option value="july">july</option>
  <option value="augost">august </option>
  <option value="september">september</option>
  <option value="october">october</option>
  <option value="november">november</option>
  <option value="december">december</option>
</select>
                                
                            </div>
                            <div class="mb-3">
                                <label>Start date</label>
                                <input type="date" name="stdate" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Payment</label>
                                <input type="text" name="payment" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Student Course</label>
                                <input type="text" name="course" class="form-control">
                            </div>
                           <?php if(isset($_GET['id'])){ $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>  

                             <div class="mb-3">
                               <label>id</label>
                             <input type="text" name="id" value="<?=$student['id'];?>" class="form-control">
                              </div>


                            <div class="mb-3">
                            
                                <button type="submit" name="save_month" class="btn btn-primary">Save Student</button>
                            </div>
                            <?php
                           } } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>