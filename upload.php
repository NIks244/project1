<!DOCTYPE html>
<html>
    <head><title></title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </head>
<body>
	<?php
		$con = mysqli_connect('localhost','root');
        mysqli_select_db($con,'displayupload');
	?>
     <div class="container">
         <h1 class=" text-white bg-dark text-center">
          IMAGES 
          </h1>
         <form method="get">  
               <a href="search.php"><button type="button" class="btn btn-primary">Search Name</button></a><br /><br /><br />
           
               <a href="csv.php"><button type="button" class="btn btn-primary">Download File</button></a>

         	</form>
         
           
               
               
         <div class="table-responsive">
             <table class="table table-borderd table-striped table-hover text-center">
                 <thead class="bgm-dark text-white">
                 <th>Id</th>
                 <th>username</th>
                 <th>image</th>
                 </thead>
                 
                 <tbody>
                  <?php 
                     
                     if(isset($_POST['submit']))
                     {
                         $username = $_POST['username'];
                         $files= $_FILES['file'];
                         
                         print_r($username);
                         echo "<br>"; 
                        
                         $filename = $files['name'];
                         $fileerror = $files['error'];
                         $filetmp = $files['tmp_name'];  
                         
                         $fileext = explode('.',$filename);
                         $filecheck=strtolower(end($fileext));
                         
                         $fileextstored = array('png','jpg','jpeg');
                         
                         if(in_array($filecheck,$fileextstored)){
                             $destinationfile = 'upload/'.$filename;
                             move_uploaded_file($filetmp,$destinationfile);
                             
                             $q="INSERT INTO imgupload(username,image) VALUES('$username','$destinationfile')";
                             
                             $query=mysqli_query($con,$q);
                             
                             $displayquery = " select * from imgupload ";
                             $querydisplay = mysqli_query($con,$displayquery);
                             
                           
                             while($result =mysqli_fetch_array($querydisplay)){
                                 ?>
                                <tr>
                                    <td><?php echo $result['id'];?></td>
                                    <td><?php echo $result['username'];?></td>
                                    <td><img src=" <?php echo $result['image']; ?>" height="200px" width="200px">
                                    </td>
                                </tr>
                     
                                  <?php 
                        }
                             
                        }else{
                             echo "extension is not matching..";
                         }
                        }
                     
                     ?>
                     
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
    </html>