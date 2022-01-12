<?php
require("dbConnection.php");
$sql="select * from nti_blog";  //read data
$objectData=mysqli_query($con,$sql);
// if($objectData){
//     echo print_r($objectData);
// }
// else{
//     die("Error:".mysqli_error($con));
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>form_validation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>



  <div class="container">

  <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">date</th>
    </tr>
  </thead>

  <?php     
       while($data = mysqli_fetch_assoc($objectData) ){

       

      ?>
  <tbody>
  <tr>
                 <td><?php echo $data['id'];?></td>
                 <td><?php echo $data['title'];?></td>
                 <td><?php echo $data['content'];?></td>
                 <td><?php echo $data['date'];?></td>
                 <td>
                 <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>           
                </td> 
   </tr> 
    
  
  </tbody>

  <?php } ?>
</table>

   

  </div>






  
</body>

</html>
