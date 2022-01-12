<?php
// session_start();
require("dbConnection.php");
// define variables and set to empty values
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = cleanAnyInput($_POST["title"]);
  $content = cleanAnyInput($_POST["content"]);
  $date = cleanAnyInput($_POST["date"]);



  # Validate title
  if (empty($title)) {
    $errors['title'] = "Field Required";
  }

  # Validate content 
  if (empty($content)) {
    $errors['content'] = "Field Required";
  }




  if (count($errors) > 0) {
    foreach ($errors as $key => $value) {

      echo '* ' . $key . ' : ' . $value . '<br>';
    }
  } else {

    $sql = "insert into nti_blog (title,content,date) values ('$title','$content','$date')";
    $data = mysqli_query($con, $sql);
    if ($data) {
      echo "raw inserted";
    } else {
      echo 'error:' . mysqli_error($con);
    }
  }
}



function cleanAnyInput($input)
{
  return  trim(strip_tags(stripslashes($input)));
}



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


    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

      <input type="hidden" value="1" name="data">
      <div class="form-group">
        <label for="title">title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="" placeholder="Enter title" required>
      </div>

      <div class="form-group">
        <label for="content">content</label>
        <input class="form-control" id="content" name="content" aria-describedby="" placeholder="Enter email" required>
      </div>

      <div class="form-group">
        <label for="date">date</label>
        <input type="date" class="form-control" id="date" name="date" aria-describedby="" placeholder="Enter date" required>
      </div>

  </div>






  <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  </div>
</body>

</html>
?>