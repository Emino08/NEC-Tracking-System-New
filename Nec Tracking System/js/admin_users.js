$(document).ready(function(){
   
  $.post("server/login_session.php", function(data, status) {
    if (data == 0) {
        location.href = "./index.html"
    }
})


      $.post("server/admin_users.php", function(data){
        // alert("Data: " + data + "\nStatus: " + status);
        $("#myTable").append(data)
    });

    $("#logout").on('click',function() {

      $.post("./server/logout.php", function(result, status) {
          // alert("Data: " + result + "\nStatus: " + status);
          location.href = "./index.html"
      })
  })
  });
