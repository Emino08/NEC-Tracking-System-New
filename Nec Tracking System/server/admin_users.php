<?php
session_start();
include_once("config.php");
$phpCode = '&lt;?php echo "iii" ?>';

        $sql1 = "SELECT username, employee_name FROM employee";
        $result1 = mysqli_query($conn,$sql1);
        
        while($row = $result1->fetch_assoc()){

                echo "<tr>
                <td class='w3-center color'>".$row["employee_name"]."</td>
                <td class='w3-center color'>".$row["username"]."</td>
                </tr>";
        }

$conn->close();
?>
