<?php

    $link = mysqli_connect("localhost", "root", "root", "labDB0819", 8889);
    mysqli_query($link, "set names utf-8");
    // $sqlCommand = "SELECT * FROM employees"; // v1
    $sqlCommand = <<< mySqlCommand
    SELECT e.employeeId, e.chineseName, e.englishName, c.cityId, c.cityName
    FROM employees e
    JOIN cities c ON e.cityId = c.cityId;
    mySqlCommand;
    $result = mysqli_query($link, $sqlCommand);
    // var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
        .container {
            padding-top: 30px;
        }
  </style>
</head>
<body>

<div class="container">
  <h2>Employee List <span><a href="newForm.php" class="btn btn-secondary float-right">New</a></span></h2>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>City</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php while($oneRow = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $oneRow["chineseName"] ?></td>
        <td><?php echo $oneRow["englishName"] ?></td>
        <td><?php echo $oneRow["cityName"] ?></td>
        <td>
            <span class="float-right">
                <a href="editForm.php?id=<?php echo $oneRow['employeeId']?>" class="btn btn-success">Edit</a>
                &nbsp;|&nbsp;
                <a href="deleteForm.php?id=<?php echo $oneRow['employeeId']?>" class="btn btn-danger">Delete</a>              
            </span>
        </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php mysqli_close($link); ?>
</body>
</html>