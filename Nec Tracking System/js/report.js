$(document).ready(function(event){
    

    // alert("Hello")
    // $.post("server/login_session.php", function(data, status) {
    //     if (data == 0) {
    //         location.href = "./index.html"
    //     }
    // })

    // $.post("server/report.php", function(data, status){
    //     // alert("Data: " + data + "\nStatus: " + status);
    //     $("#myTableL").append(data)

    // })
    // $("#logout").on('click',function() {

    //     $.post("server/logout.php", function(result, status) {
    //         // alert("Data: " + result + "\nStatus: " + status);
    //         location.href = "./index.html"
    //     })
    // })
    
    

    let selected4 = $("#status");
      selected4.change(function(event) {
        let selected3 = selected4.val();
        // alert(selected3)
        let formData = {
                status:selected3,
            };

                $.post("server/report.php",formData, function(result, status) {
            // alert("Data: " + result + "\nStatus: " + status);
            $("#myTable").empty()
            let data = `
            <tr>
            <th colspan ="4" style="width:25%;" class="w3-center">A Memo report on Monthly activities</th>
            </tr>
            <tr>
            <th style="width:25%;" class="w3-center">No</th>
            <th style="width:25%;" class="w3-center">Purpose</th>
            <th style="width:25%;" class="w3-center">Date created</th>
            <th style="width:25%;" class="w3-center">Status</th>
            </tr>`
            let newData = data + result
            $("#myTable").append(newData)

            $("#status").val('')
            
        })
      })

      let selected1 = $("#status1");
      selected1.change(function(event) {
        let selected3 = selected1.val();
        // alert(selected3)
        // let formData = {
        //         status:selected3,
        //     };

                $.post("server/request.php", function(result, status) {
            // alert("Data: " + result + "\nStatus: " + status);
            $("#myTable").empty()
            let data = `
            <tr>
            <th colspan ="5" style="width:25%;" class="w3-center">A Help Desk requests report on Monthly activities</th>
            </tr>
            <tr>
            <th style="width:20%;" class="w3-center">No</th>
            <th style="width:20%;" class="w3-center">Status</th>
            <th style="width:20%;" class="w3-center">Date</th>
            <th style="width:20%;" class="w3-center">Solved By</th>
            <th style="width:20%;" class="w3-center">Department</th>
            </tr>`
            let newData = data + result
            $("#myTable").append(newData)

            $("#status1").val('')
            
        })
      })
})


