<?php
include "koneksi.php";
$currentDate = date("Y-m-d");

$jenis = intval($_GET['q']);

$sql = "SELECT * FROM tb_mutasi_shift_1_to_gs WHERE jenis  LIKE ? AND DATE(dibuat_pada) = CURDATE()";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $jenis);
$stmt->execute();
$result = $stmt->get_result();


$noUrut = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
            echo  "<tr>";
            echo  "<td>". $noUrut++ ."</td>";
            echo "<td>";
              if ($jenis == 0) {
                  echo "Shift GS";
              } else {
                  echo "Shift " . $jenis;
              }
              echo "</td>";
              echo "<td>" . $row["nama"] . "</td>";
              echo "<td>" . $row["NIK"] . "</td>";
              echo "<td>" . $row["jabatan"] . "</td>";
              echo "<td>" . $row["pos"] . "</td>";
              echo '<td><img src="' . $row["ttd"] . '" alt="Signature" style="width: 100px; height: 50px;"></td>';
              echo "<td>" . $row["keterangan"] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "0 results";
      }
        



?>