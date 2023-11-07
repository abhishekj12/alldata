<?php
include('connection.php');
$limit = 5;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM data ORDER BY name ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql);  
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Name</th>  
<th>Email</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row = mysqli_fetch_array($rs_result)) {  
?>  
            <tr>  
            <td><?php echo $row["name"]; ?></td>  
            <td><?php echo $row["email"]; ?></td>
          <td><?php echo  $row['pernission'] ?></td>
          <td><a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure?')"><img src="a.png" widht="100px" height="40px"></a></td>
          <td>
            <a href="edit.php?id=<?php echo $row['id'] ?>"><img src="pen.png" widht="100px" height="40px"></a>
          </td>
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>    