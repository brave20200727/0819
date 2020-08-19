<?php
    $linkCity = mysqli_connect("localhost", "root", "root", "labDB0819", 8889);
    mysqli_query($linkCity, "set names utf-8");
    $sqlCommandCity = "SELECT * FROM cities";
    $resultCity = mysqli_query($linkCity, $sqlCommandCity);

    // var_dump($link);
    if(isset($_POST["submit"])) {
        $chineseName = $_POST["chineseName"];
        $englishName = $_POST["englishName"];
        $cityId = $_POST["select"];
        $link = mysqli_connect("localhost", "root", "root", "labDB0819", 8889);
        mysqli_query($link, "set names utf-8");
        $sqlCommand = <<<mySqlCommand
        INSERT INTO employees(chineseName, englishName, cityId) VALUES('$chineseName', '$englishName', $cityId);
        mySqlCommand;
        mysqli_query($link, $sqlCommand);
        mysqli_close($link);
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container {
            padding-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
        <div class="form-group row">
            <label for="chineseName" class="col-4 col-form-label">Chinese Name</label> 
            <div class="col-8">
            <input id="chineseName" name="chineseName" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="englishName" class="col-4 col-form-label">English Name</label> 
            <div class="col-8">
            <input id="englishName" name="englishName" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">City</label> 
            <div class="col-8">
            <select id="select" name="select" class="custom-select">
                <!-- <option value="2">台北</option>
                <option value="4">台中</option>
                <option value="6">台南</option> -->
                <?php while($oneRowCity = mysqli_fetch_assoc($resultCity)) {?>
                <option value="<?php echo $oneRowCity["cityId"] ?>"><?php echo $oneRowCity["cityName"] ?></option>
                <?php } ?>
            </select>
            </div>
        </div> 
        <div class="form-group row">
            <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary" value="1">送出</button>
            </div>
        </div>
        </form>
    </div>
    <?php mysqli_close($linkCity); ?>
</body>
</html>