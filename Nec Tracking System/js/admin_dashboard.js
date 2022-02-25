$(document).ready(function(event){

    $.post("server/ict_dashboard.php", function(result, status) {
        // alert("Data: " + result + "\nStatus: " + status);
        let solution = JSON.parse(result);

        $("#no_problems").text(solution.total)
        $("#no_solved").text(solution.solved)
        $("#no_notsolved").text(solution.not_solved)
    })

    $.post("server/admin_dashboard.php", function(result, status) {
        // alert("Data: " + result + "\nStatus: " + status);
        let solution = JSON.parse(result);

        $("#accepted").text(solution.accepted)
        $("#rejected").text(solution.rejected)
        $("#processing").text(solution.processing)
    })

    $("#logout").on('click',function() {

        $.post("server/logout.php", function(result, status) {
            // alert("Data: " + result + "\nStatus: " + status);
            location.href = "./index.html"
        })
    })
})