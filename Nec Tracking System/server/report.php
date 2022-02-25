<?php
include_once("config.php");
$status = test_input($_POST['status']);

if (strcmp($status, '4') == 0) {
    $sql = "SELECT memo_heading, date_time, status FROM uploads ORDER BY date_time ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            $statusvalue = '';
            if (strcmp($row['status'], '1') == 0) {
                $statusvalue = "Accepted";
            } else if (strcmp($row['status'], '2') == 0) {
                $statusvalue = "Rejected";
            } else if (strcmp($row['status'], '3') == 0) {
                $statusvalue = "Processing";
            }

            echo "<tr>
            <td class='w3-center'>" . $count . "</td>
            <td class='w3-center'>" . $row['memo_heading'] . "</td>
            <td class='w3-center'>" . $row['date_time'] . "</td>
            <td class='w3-center'>" . $statusvalue . "</td>
            </tr>
            <tr>";
            $count++;
        }
    } else {
        echo "0 results";
    }
} else {
    $sql = "SELECT memo_heading, date_time, status FROM uploads WHERE status = '$status' ORDER BY date_time ASC";
    $result = $conn->query($sql);
    $statusvalue = '';
    if (strcmp($status, '1') == 0) {
        $statusvalue = "Accepted";
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $count = 1;
        while ($row = $result->fetch_assoc()) {

            echo "<tr>
        <td class='w3-center'>" . $count . "</td>
        <td class='w3-center'>" . $row['memo_heading'] . "</td>
        <td class='w3-center'>" . $row['date_time'] . "</td>
        <td class='w3-center'>" . $statusvalue . "</td>
        </tr>
        <tr>";
            $count++;
        }
    } else {
        echo "0 results";
    }
}
$conn->close();
