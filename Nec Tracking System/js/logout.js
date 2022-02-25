$(document).ready(function() {
    $.post("server/logout.php", function (data, status) {
        if (data === "1") {
            window.location.href = "nectracking.epizy.com"+"/Nec%20Tracking%20System/helpdesk_staff.html"
        }
        // else{
        //     alert("Employee ID or Password is Incorrect")
        // }
    })
})