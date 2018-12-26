<?php
require_once "config.php";
if (isset($_GET['order'])) {
  $order = "order by ". $_GET['order'];
}
else $order = "";
$sql = "select g.*, count(c.id) as soluongxe from giangvien g left join car c
 on c.magiangvien = g.magiangvien group by g.magiangvien $order";
$result = mysqli_query($conn, $sql);
if (!$result) {
  echo mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Giang vien</title>
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
    <a href="monhoc/dsmon.php">Xem danh sách môn học</a><br>
    <a href="gv-mh/gvmh.php">Xem danh sách giảng viên-môn học</a><br>
    <a href="giangvien/somon.php">Xem số môn dạy của mỗi giảng viên</a>
    <form method="post" action="giangvien/add.php">
      <label>Mã giảng viên</label>
      <input type="text" name="id">
      <br><br>
      <label>Tên giảng viên</label>
      <input type="text" name="name">
      <br><br>
      <input type="submit" name="add" value="Add">
    </form>
    <form action="delete.php" method="post">
        <table style="width:100%">
          <tr> 
            <th></th>
            <th>Mã giảng viên</th>
            <th>Tên giảng viên</th>
            <th><a href="?order=soluongxe">Số lượng xe</a></th>
            <th>Action</th>
          </tr>
          <?php 
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><input type="checkbox" name="check[]" value="<?php echo $row['magiangvien']; ?>"></td>
                <td><?php echo htmlentities($row['magiangvien']) ?></td>
                <td><?php echo htmlentities($row['tengiangvien']) ?></td>
                <td><?php echo htmlentities($row['soluongxe'])?></td>
                <td>
                  <a href="giangvien/edit.php?id=<?php echo $row['magiangvien'];?>&name=<?php echo $row['tengiangvien']; ?>">Edit</a>
                  <a href="giangvien/delete.php?id=<?php echo $row['magiangvien']; ?>">Delete</a>
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