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
    $.post("server/rejected.php",formData, function(data, status){
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
    let select = document.querySelector("#select_"+id).value
  
    // alert(select.length)
  

    var solData = {
        username:id,
        select:select,
    };

    $.post("./server/select.php",solData, function(data, status) {
        alert(data);
    })

    $("#logout").on('click',function() {

        $.post("./server/logout.php", function(result, status) {
            // alert("Data: " + result + "\nStatus: " + status);
            location.href = "./index.html"
        })
    })
}

