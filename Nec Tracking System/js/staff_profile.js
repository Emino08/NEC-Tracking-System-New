$(document).ready(function(event){
    $.post("server/chg_profile.php", function(data, status){
        if(data == 1){
            location.href = "./index.html"
        }
        let details = JSON.parse(data)

            $("#username").val(details['username'])
            $("#fName").val(details['employee_name'])
            $("#department").val(details['department'])


    })

    $("#f_login").submit(function(event){
        var formData = {
            username: $("#username").val(),
            f_name: $("#fName").val(),
            department: $("#department").val(),
            opassword: $("#opassword").val(),
            npassword: $("#npassword").val(),
            rpassword: $("#rpassword").val(),
        };
       

        $.post("server/staff_profile.php",formData, function(data, status){
            alert(data)
            $("#opassword").val('')
            $("#npassword").val('')
            $("#rpassword").val('')
        })
    });

    $("#logout").on('click',function() {

        $.post("server/logout.php", function(result, status) {
            // alert("Data: " + result + "\nStatus: " + status);
            location.href = "./index.html"
        })
    })
})