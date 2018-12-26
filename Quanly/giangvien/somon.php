<?php 
require_once '../config.php';
$sql = "select count(gm.mamonhoc) as somonday, g.tengiangvien from giangvien_monhoc gm left join giangvien 
g on g.magiangvien = gm.magiangvien group by g.magiangvien order by somonday";
if (!$result = mysqli_query($conn, $sql)){
  echo mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>So mon day</title>
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
    <a href="../gv-mh/gvmh.php">Xem danh sách giảng viên-môn học</a>
        <table style="width:100%">
          <tr> 
            <th>Mã giảng viên</th>
            <th>Số môn dạy</th>
          </tr>
          <?php 
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?php echo htmlentities($row['tengiangvien']) ?></td>
                <td><?php echo htmlentities($row['somonday']) ?></td>
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
  </body>
</html>

