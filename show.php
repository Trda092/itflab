<html>
<head>
<title>ITF Lab</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'server092.mysql.database.azure.com', 'Trda092@server092', 'Tadaohm1234', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<center><header>Data table font-size: 40px;</header></center>
<div class="container">
<table class="table table-dark">
  <thead>
  <tr>
    <th width="100"> <div align="center">Name</div></th>
    <th width="350"> <div align="center">Comment </div></th>
    <th width="150"> <div align="center">Link </div></th>
  </tr>
</thead>
<tbody>
<?php
while($Result = mysqli_fetch_array($res))
{
?>
   <tr>
    <td><center><?php echo $Result['Name'];?></center></div></td>
    <td><center><?php echo $Result['Comment'];?></center></td>
    <td><center><?php echo $Result['Link'];?></center></td>
  </tr>
<?php
}
?>
</tbody>
</table>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>
