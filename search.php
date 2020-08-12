<?php
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'displayupload');
$output = '';


if(isset($_POST['search']))
{
    $searchq= $_POST['search'];
    $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    
    $query = mysqli_query($con,"SELECT * FROM imgupload where username LIKE '%$searchq%'");
    $count =mysqli_num_rows($query);
    if($count == 0)
    {
        $output ='there was no search results!';
    }else{
            while($row=mysqli_fetch_array($query))
            {
            
            $username=$row['username'];
            $image=$row['image'];
      
    $output ='<div class="text-center">'.$username.'<br><h4>username</h4><h4>image name</h4>'.$image.'</div>';
          
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
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
<div class="col-lg-8 m-auto d-block">
<form action="search.php" method="post" enctype="multipart/form-data">
     <h1 class="text-white bg-dark text-center">
          SEARCH IMAGES 
     </h1>
    
    <div class="form-group">
        <label for="search">Search</label>
            <input type="text" name="search" id="search" class="form-control">
    </div>

    <input type="submit" name="submit" value="check" />

    <a href="index.php">Home</a>	
</form>
    </div>

<?php print("$output"); ?> 

</body>
</html>


