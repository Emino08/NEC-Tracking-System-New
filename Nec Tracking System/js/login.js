$(document).ready(function(){
    $.post("server/login_session.php", function(data, status){
        // alert(data)
        if (data === "1") {
          window.location.href = "./ict_dashboard.html";
        } else if (data === "2") {
          window.location.href = "./admin_dashboard.html";
        } else if (data === "0") {
          window.location.href = "./helpdesk_staff.html";
        }
       
    })

    $("#f_login").submit(function(event){
    //   let employeeId = $("#employee_id").val();
    //   let password = $("#password").val();
      var formData = {
        username: $("#username").val(),
        password: $("#password").val(),
      };

    $.post("server/login_validation.php",formData, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);

         let flag = JSON.parse(data);
        if (!flag.success) {
            if (flag.errors.username) {
              $("#username").addClass("w3-pale-red");
              $("#username").attr("placeholder", 'Employee ID is required');
            }

            if (flag.errors.password) {
              $("#password").addClass("w3-pale-red");
              $("#password").attr("placeholder", 'Password is required')
            }
        }

      });

      $.post("server/login.php",formData, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status)
        if(data === "7"){
              window.location.href = "./change_password.html"
          }else if(data === "0"){

            window.location.href = "./helpdesk_staff.html"
        } else if(data === "1"){

              window.location.href = "./ict_dashboard.html"
          }else if(data === "2"){

              window.location.href = "./admin_dashboard.html"
          } else{
            alert("Employee ID or Password is Incorrect")
        } 
    })
    });
  });
