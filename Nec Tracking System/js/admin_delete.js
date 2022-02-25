$(document).ready(function(){
  $.post("server/login_session.php", function(data, status) {
    if (data == 0) {
        location.href = "./index.html"
    }
})


  $("#f_login").submit(function(event){
    var formData = {
      username:$("#username").val(),
    };

    $.post("server/admin_delete.php",formData, function(data){
      
      if(data.length > 1){
          alert(data)
          $("#username").val('')
      }else{
          "DID NOT DELETE"
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
