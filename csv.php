<?php
require('database.php');
$sql="select * from imgupload";
$res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Export data to excel in PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="col-lg-8 m-auto d-block">
<form action="csv.php" method="post" enctype="multipart/form-data">
     <h1 class="text-white bg-dark text-center">
          EXPORT DATA
     </h1>
        </form>
    </div>
<div class="container">
  <a href="export.php"><button type="button" class="btn btn-primary">Export</button></a><br>
    <a href="index.php"><button type="button" class="btn btn-primary">Home</button></a><br>
    <a href="search.php"><button type="button" class="btn btn-primary">search</button></a>

  <table class="table table-bordered  table-striped">
    <thead>
      <tr>
        <th>username</th>
        <th>image</th>
      </tr>
    </thead>
    <tbody>
	 <?php while($row=mysqli_fetch_assoc($res)){?>	
	 <tr>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['image']?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<style>
.btn{
	float: right;
    margin-bottom: 20px;
    margin-top: 20px;
}
</style>
</body>
</html>
