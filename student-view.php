<?php  
  
 require 'dbcon.php';
?>


<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
  .center-content {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* This ensures the content is vertically centered on the viewport */
  }
</style>

    <title>Student View</title>
</head>
<body>

    <div class="container mt-5 center-content ">

    <div class="row  ">
        <div class="col-md-12 ">
            
                <div class="card ">
                    <div class="card-header ">
                       
                       
                    </div>
                    <?php
	
	$png = file_get_contents("mahara.jpeg");
	$pngbase64 = base64_encode($png);
?>





	
	<img src='data:image;base64,<?= $pngbase64;?>' style='height: 200px; width: 200px;display: flex;  justify-content: center;' alt='mahara' /></div>
                    <div class="card-body ">
                    
                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            //$query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query = "SELECT students.id, students.name,students.email, students.phone, month.course, month.monthname, month.payement
                                        FROM students
                                        INNER JOIN monthstud ON students.id = monthstud.ids
                                        INNER JOIN month ON monthstud.idm = month.idmonth WHERE students.id='$student_id'";
                            $query_run = mysqli_query($con, $query);
                            
                            

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                              $course= $student['course'];
                              $phone=$student['phone'];

                              
                             
                              
                              
                            
                             
                              
                             
                              
                              




                               ?>
                               
                              <br>
                             <div class="mb-3">
                                        <h2>Student Name:  <?=$student['name'];?></h2>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <H2>Student Email:  <?=$student['email'];?></H2>
                                       
                            </H2>
                                    </div>
                                    <div class="mb-3">
                                        <H2>Student Phone:  <?=$student['phone'];?></H2>
                                        
                                          
                            
                                    </div>
                                    <div class="mb-3">
                                        <H2>Student Course:  <?=$student['course'];?></H2>
                                        
                                    </div>

                                    <div class="mb-3">
                                        <H2>Payment:  <?=$student['payement'];?></H2>
                                        
                                    </div>
                                    
                                    

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 