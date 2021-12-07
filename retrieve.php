
<?php

include "connection.php"; // Using database connection file here

$records = mysqli_query($database,"select * from tblemp"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['fullname']; ?></td>
    <td><?php echo $data['age']; ?></td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($db); // Close connection ?>

