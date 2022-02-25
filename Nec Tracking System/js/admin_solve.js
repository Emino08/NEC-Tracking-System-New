$(document).ready(function(event){
    var formData = {
        success:"true",
    };
    

    // alert("Hello")
    $.post("server/login_session.php", function(data, status) {
        if (data == 0) {
            location.href = "./index.html"
        }
    })

    $.post("server/admin_solved.php",formData, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        $("#myTable").append(data)

    })
    $("#logout").on('click',function() {

        $.post("server/logout.php", function(result, status) {
            // alert("Data: " + result + "\nStatus: " + status);
            location.href = "./index.html"
        })
    })

})
let save_solution = (e) =>{

    let id = e.target.id.split("_")[1]
    let solution = document.querySelector("#text_"+id).value
    // alert(solution)
    let status = document.querySelector("#select_"+id).value
   
    // alert(solution.length + " " + status)
    if((solution.length === 0 && status === "1") || (solution.length === 0 && status === "0") || (solution.length > 0 && status === "2") || (solution.length > 0 && status === "0")){
        alert("Use Corrected Fields")
        return
    }

    var solData = {
        username:id,
        solution:solution,
        status:status
    };

    $.post("server/solution.php",solData, function(data, status) {
        alert(data);


    })
}
