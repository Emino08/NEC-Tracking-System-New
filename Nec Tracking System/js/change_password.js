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
        let formData = {
            username: $("#username").val(),
            f_name: $("#fName").val(),
            department: $("#department").val(),
            opassword: $("#opassword").val(),
            npassword: $("#npassword").val(),
            rpassword: $("#rpassword").val(),
        };

        let password = $("#npassword").val()
        let chgData = {
            username: $("#username").val(),
            password: password
        };
        

        $.post("server/staff_profile.php",formData, function(data, status){
            alert(data)
            $("#opassword").val("")
            $("#npassword").val("")
            $("#rpassword").val("")
            $.post("server/login_update.php",chgData, function(data, status){
                if(data === "0"){

                    window.location.href = "./helpdesk_staff.html"
                } else if(data === "1"){
        
                      window.location.href = "./ict_dashboard.html"
                  }else if(data === "2"){
        
                      window.location.href = "./admin_dashboard.html"
                  }
        
            })
            
        })
    });

})