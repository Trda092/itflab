<html>
<head>
<title>ITF Lab</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
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
<center><header style="font-size:300%;">Data table</header></center>
<div class="container">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table class="table" id="myTable">
  <thead class="thead-dark">
  <tr>
    <th width="100"> <div align="center">Name</div></th>
    <th width="250"> <div align="center">Comment </div></th>
    <th width="150"> <div align="center">Link </div></th>
    <th width="100"> <div align="center">Button </div></th>
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
    <td><center><button type="button" class="btn btn-danger">Remove</button></center></td>
  </tr>
<?php
}
?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script src="jquery.min.js"></script>
<script>
  $('.table tbody').on('click','.btn',function(){
    $(this).closest('tr').remove();
  });
</script>
</tbody>
</table>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>
