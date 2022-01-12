<?php
require("dbConnection.php");
$id = $_GET['id'];


$sql = "select * from nti_blog where id = $id ";
$data = mysqli_query($con, $sql);

if (mysqli_num_rows($data) == 1) {
    # fetch data
    $Userdata = mysqli_fetch_assoc($data);
} else {
    $Message = 'Invalid Id ';
    $_SESSION['Message'] = $Message;
    header("Location: read.php");
}

function Clean($input)
{

    return  trim(strip_tags(stripslashes($input)));
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title     = Clean($_POST['title']);
    $content    = Clean($_POST['content']);
    $date    = Clean($_POST['date']);


    $errors = [];

    # Validate title ...
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

        $sql = "update nti_blog set title='$title' , content = '$content' , date = '$date' where id  = $id";

        $op  = mysqli_query($con, $sql);

        if ($op) {
            $Message = "Raw Updated";
        } else {
            $Message = "Error Try Again " . mysqli_error($con);
        }

        $_SESSION['Message'] = $Message;
        header("Location: read.php");
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Update</h2>


        <form action="edit.php?id=<?php echo $Userdata['id']; ?>" method="post">



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

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>



</body>

</html>




?>