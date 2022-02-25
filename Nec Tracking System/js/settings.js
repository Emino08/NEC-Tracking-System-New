// $(document).ready(function(event){


  function navBar() {
    var x = document.getElementById("demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
// })
function search() {
    // Declare variables
    var input, filter, table, tr, td, td1, i;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
table = document.getElementById("myTable");
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[1];
  // td1 = tr[i].getElementsByTagName("td")[1];
  if (td) {
    txtValue = td.textContent || td.innerText;
    // txtValue1 = td1.textContent || td1.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1){
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}
  }

  function searchDate() {
    // Declare variables
    var input, filter, table, tr, td, td1, i;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
table = document.getElementById("myTable");
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[2];
  // td1 = tr[i].getElementsByTagName("td")[1];
  if (td) {
    txtValue = td.textContent || td.innerText;
    // txtValue1 = td1.textContent || td1.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1){
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}
  }

  function printTable() 
 {
 
   var tableToPrint=document.getElementById('myTable');
 
   var newWin=window.open('','Print-Window');
 
   newWin.document.open();
 
   newWin.document.write('<html><head><link rel="stylesheet" href="./css/w3.css"></head><body onload="window.print()"><center><h1>NATIONAL ELECTORAL COMMISSION - ICT</h1></center><table border="2">'+tableToPrint.innerHTML+'</table></body></html>');
 
   newWin.document.close();
 
   setTimeout(function(){newWin.close();},10);
 
 }

//  $(".logout").on('click',function() {

//   $.post("./server/logout.php", function(result, status) {
//       // alert("Data: " + result + "\nStatus: " + status);
//       location.href = "./index.html"
//   })
// })

let logout = (e) =>{
// e.target.addEventListener("click",()=>{
  $.post("./server/logout.php", function(result, status) {
    // alert("Data: " + result + "\nStatus: " + status);
    location.href = "./index.html"
    // console.log("Hii");
})
// })

}

$(document).ready(function(event){
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
  });
})