<?php
require_once "../config.php";
$sql = "select gm.*, g.tengiangvien, m.tenmonhoc from giangvien_monhoc gm
 join giangvien g on g.magiangvien = gm.magiangvien
join monhoc m on m.mamonhoc = gm.mamonhoc";
$result = mysqli_query($conn, $sql);
if (!$result) {
  echo mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Gv-mh</title>
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
    <a href="../monhoc/dsmon.php">Xem danh sách môn học</a>
    <a href="../index.php">Xem danh sách giảng viên</a>
    <form method="post" action="add.php">
      <label>Mã giảng viên</label>
      <input type="text" name="mgv">
      <br><br>
      <label>Mã môn học</label>
      <input type="text" name="mmh">
      <br><br>
      <label>Ngày bắt đầu</label>
      <input type="date" name="date">
      <br><br>
      <input type="submit" name="add" value="Add">
    </form>
    <form action="delete.php" method="post">
        <table style="width:100%">
          <tr> 
            <th></th>
            <th>Mã giảng viên</th>
            <th>Tên giảng viên</th>
            <th>Mã môn học</th>
            <th>Tên môn học</th>
            <th>Ngày bắt đầu</th>
            <th>Action</th>
          </tr>
          <?php 
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><input type="checkbox" name="check[]" value="<?php echo $row['magiangvien']." ".$row['mamonhoc']; ?>"></td>
                <td><?php echo htmlentities($row['magiangvien']) ?></td>
                <td><?php echo htmlentities($row['tengiangvien']) ?></td>
                <td><?php echo htmlentities($row['mamonhoc']) ?></td>
                <td><?php echo htmlentities($row['tenmonhoc']) ?></td>
                <th><?php echo htmlentities($row['ngaybatdau']) ?></th>
                <td>
                  <a href="edit.php?mgv=<?php echo $row['magiangvien']; ?>
                  &mmh=<?php echo $row['mamonhoc']; ?>&date=<?php echo $row['ngaybatdau']; ?>">Edit</a>
                  <a href="delete.php?mgv=<?php echo $row['magiangvien']; ?>&mmh=<?php echo $row['mamonhoc'];?>">Delete</a>
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