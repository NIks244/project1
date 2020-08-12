<?php
require('database.php');
$sql="select * from imgupload";
$res=mysqli_query($con,$sql);
$html='<table><tr><td>username</td><td>image</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['username'].'</td><td>'.$row['image'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
echo $html;
?>
