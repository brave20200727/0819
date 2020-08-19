<?php
    require_once("config.php"); // 引用檔案（最好副檔名都為php）
	// $dbhost = 'localhost';
	// $dbuser = 'root';
	// $dbpass = 'root';
	// $dbname = 'directory';
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, 8889); // 建立與mysql資料庫的連接
    // var_dump($link);
    // $sqlCommand = "SELECT * FROM employee"; // sql command v1
    $sqlCommand = "SELECT * , (SELECT COUNT(*) FROM employee WHERE managerId = e.id) AS reporter FROM employee AS e"; // sql command v2
    // var_dump($link);
    $result = mysqli_query($link, $sqlCommand); // 對資料庫下sql指令
    // var_dump($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<script src="scripts/jquery-1.9.1.min.js"></script>
<script src="scripts/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" href="scripts/jquery.mobile-1.3.2.min.css" />
<link rel="stylesheet" href="styles.css" />
</head>
<body>
<div data-role="page" data-theme="c">

<div data-role="header">
	<h1>Employee Details</h1>
</div>

<div data-role="content">
	<ul data-role="listview" data-filter="true">
        <?php while($oneRow = mysqli_fetch_assoc($result)) { ?>
            <li>
                <a href="employeeDetails.php?id=<?php echo $oneRow["id"] ?>"> 
                    <img src="images/<?php echo $oneRow["picture"] ?>">
                    <h4><?php echo $oneRow["firstName"] . "&nbsp;" . $oneRow["lastName"] ?></h4>
                    <p><?php echo $oneRow["title"]?></p> <span class="ui-li-count"><?php echo $oneRow["reporter"]?></span>
                </a>
            </li>
        <?php } ?>
	</ul>
</div>

</div>
<?php
    mysqli_close($link);
?>
</body>
</html>