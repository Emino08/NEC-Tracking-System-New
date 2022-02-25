$(document).ready(function(){
  $.post("server/login_session.php", function(data, status) {
    if (data == 0) {
        location.href = "./index.html"
    }
})


    $("#f_login").submit(function(event){
      var formData = {
        username:$("#username").val(),
        name: $("#name").val(),
        email: $("#email").val(),
        department: $("#department").val(),
        phonenumber: $("#phonenumber").val(),
        sex: $("#sex").val(),
          option:$("#option").val()
      };

      $.post("server/admin_update.php",formData, function(data){
        // alert("Data: " + data + "\nStatus: " + status);
        if(data.length > 1){
        alert(data)
        $("#username").val('')
        $("#name").val('')
        $("#email").val('')
        $("#department").val('')
        $("#phonenumber").val('')
        $("#sex").val('')
        $("#option").val('')
        }else{
            "Not Updated"
        }
        
    })
    });

    $("#logout").on('click',function() {

      $.post("./server/logout.php", function(result, status) {
          // alert("Data: " + result + "\nStatus: " + status);
          location.href = "./index.html"
      })
  })
  });
