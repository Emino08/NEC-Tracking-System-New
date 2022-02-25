<?php
include_once("config.php");
$sql = "SELECT file_name, memo_heading,upload_id, status, username,date_time FROM uploads WHERE status = 2
ORDER BY date_time DESC";
$result = $conn->query($sql);
//$result1 = $conn->query($sql1);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user = $row['username'];
        $sql1 = "SELECT employee_name FROM employee WHERE username = '$user'";
        $result1 = $conn->query($sql1);
        $row1 =  $result1->fetch_assoc();
        echo "<tr onclick=\"document.getElementById('" .$row["upload_id"]. "').style.display='block'\">
        <td class='w3-center color'>".$row["memo_heading"]."</td>
        <td class='w3-center color'>".$row["date_time"]."</td>
        </tr>"."
        <td class='color'>
        <div class='w3-container'>
        <div id='" .$row["upload_id"]. "' class='w3-modal'>
          <div class='w3-modal-content'>
            <header class='w3-container color'> 
              <span onclick=\"document.getElementById('" .$row["upload_id"]. "').style.display='none'\" 
              class='w3-button w3-display-topright'>&times;</span>
              <h3>" .$row1["employee_name"]. "</h3>
              <span>" .$row["date_time"]. "</span>
            </header>
            <div class='w3-container'>
              <p style='color: black'>" .$row["memo_heading"]. "</p>
            </div>
            <footer class='w3-container color'>
              <p><div class='w3-row-padding'>
        <div class='w3-half w3-center'>
        <select id='"."select_".$row["upload_id"]."' onchange='save_solution(event)' class='w3-select w3-border w3-round-xxlarge w3-margin' style='height: 40px;width: 70%'  name='option'>
                  <option value='2' selected>Rejected</option>
                  <option value='1' >Accepted</option>
                  <option value='3' >Processing</option>
                </select>
          </div>
        <div class='w3-half w3-center'>
        <p><a class='w3-button w3-black w3-round-xxlarge ' href='" ."./server/".$row["file_name"]. "' >Download</a></p>
        </div>
        </div>" .
                    "</p>
            </footer>
          </div>
        </div>
        </div>  </td>" ;


    }
} else {
    echo "0 results";
}
$conn->close();
