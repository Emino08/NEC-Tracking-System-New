<?php
include_once("config.php");
$phpCode = '&lt;?php echo "iii" ?>';
//$sql1 = "SELECT department, employee_name FROM employee";
$sql = "SELECT request, username,request_id, request_type, date_time, status,solution FROM request WHERE status = 2
ORDER BY date_time DESC";
$result = $conn->query($sql);
//$result1 = $conn->query($sql1);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $uname = $row["username"];
        $sql1 = "SELECT department, username, employee_name FROM employee WHERE username = '$uname'";
        $result1 = mysqli_query($conn,$sql1);
        if($row1 = $result1->fetch_assoc()){

      if(strcmp($row['status'],'2')===0){
                echo "<tr onclick=\"document.getElementById('" .$row["request_id"]. "').style.display='block'\">
        <td class='w3-center color'>".$row["request_type"]."</td>
        <td class='w3-center color'>".$row["date_time"]."</td>
        </tr>"."
        <td class='color'>
        <div class='w3-container'>
  
      
        <div id='" .$row["request_id"]. "' class='w3-modal'>
          <div class='w3-modal-content'>
            <header class='w3-container color'> 
              <span onclick=\"document.getElementById('" .$row["request_id"]. "').style.display='none'\" 
              class='w3-button w3-display-topright'>&times;</span>
              <h3>" .$row1["employee_name"]. "</h3>
              <span>" .$row["date_time"]. "</span>
              <h4>".$row1["department"]."</h4>
            </header>
            <div class='w3-container'>
              <p style='color: black'>" .$row["request"]. "</p>
            </div>
            <footer class='w3-container color'>
              <p><div class='w3-row-padding'>
  <div class='w3-third'>
    <textarea maxlength='1000' id='"."text_".$row["request_id"]."' class='w3-input w3-border w3-round-xxlarge w3-padding'  placeholder='Write a Solution'>".$row["solution"]."</textarea>
  </div>
  <div class='w3-third w3-center'>
    <select id='"."select_".$row["request_id"]."' class='w3-select w3-border w3-round-xxlarge w3-margin' style='height: 40px;width: 70%'  name='option'>

                  <option value='1' >Solved</option>
                  <option value='2' selected>Not Solved</option>
                </select>
                
  </div>
  <div class='w3-third w3-center'>
    <p><button onclick='save_solution(event)' id='"."button_".$row["request_id"]."' style='margin-bottom: 30px; height: 40px;width: 70%' class='w3-button w3-black w3-round-xxlarge '>Save Solution</button></p>
  </div>
</div>" .
                    "</p>
            </footer>
          </div>
        </div>
      </div>  </td>";
    }


        }else{
            echo "failed";
        }

    }
} else {
    echo "0 Problem Found";
}
$conn->close();
?>