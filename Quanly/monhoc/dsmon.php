<?php
require_once "../config.php";
$sql = "select * from monhoc";
$result = mysqli_query($conn, $sql);
if (!$result) {
  echo mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Mon hoc</title>
  </head>
  <style>
   table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 4px;
  }

  </style>
  <body>
    <a href="../index.php">Home</a>
    <form method="post" action="add.php">
      <label>Mã môn học</label>
      <input type="text" name="id">
      <br><br>
      <label>Tên môn học</label>
      <select name="name">
        <option value="Toán">Toán</option>
        <option value="Lý">Lý</option>
        <option value="Hóa">Hóa</option>
      </select>
      <br>
      <input type="submit" name="add" value="Add">
    </form>
    <form action="monhoc/delete.php" method="post">
        <table style="width:100%">
          <tr> 
            <th></th>
            <th>Mã môn học</th>
            <th>Tên môn học</th>
            <th>Action</th>
          </tr>
          <?php 
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><input type="checkbox" name="check[]" value="<?php echo $row['mamonhoc']; ?>"></td>
                <td><?php echo htmlentities($row['mamonhoc']) ?></td>
                <td><?php echo htmlentities($row['tenmonhoc']) ?></td>
                <td>
                  <a href="edit.php?id=<?php echo $row['mamonhoc']; ?>&name=<?php echo $row['tenmonhoc']; ?>">Edit</a>
                  <a href="delete.php?id=<?php echo $row['mamonhoc']; ?>">Delete</a>
                </td>
              </tr>
          <?php

        }
        mysqli_free_result($result);
      } else {
        echo "<tr><td colspan='4' style='text-align:center'><span style='color:red;'>No record here</span></td></tr>";
      }
      mysqli_close($conn);
      ?>
        </table>
        <input type="submit" value="Xóa" name="delete">
    </form>
  </body>
</html>