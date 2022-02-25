$(document).ready(function(event){

  $.post("./server/login_session.php", function(result, status){
    // alert("Data: " + result + "\nStatus: " + status);
    if(result == 0){
      location.href = "./index.html"
    }
  });
  function appendList(data) {
    $('#isSelected1').empty();
    for (let index = 0; index <= data.length; index++) {
      $('#isSelected1').append('<option value=" ">' + data[index].problems + '</option>');
   }

  }
//   + data[index].prodescrip + 
// Generate a List
let selected = $("#isSelected");

selected.change(function(event) {
  let selected3 = $("#isSelected option:selected").text();
  let secondList = $("#isSelected1");
  $("#isSelected").removeClass("w3-red");
  $("#isSelected1").removeClass("w3-red");


  if (selected3 !== "Problem Types") {
    secondList.attr("disabled", false);
    
    if (selected3 === "Network") {
      const network = [
        {"prodescrip": "Netpro1", "problems": "My Internet is not working"},
        {"prodescrip": "Netpro2", "problems": "My wifi is not responding to the internet"},
        {"prodescrip": "Others", "problems": "Others"}
      ];

      appendList(network);
    }

    if (selected3 === "Printer") {
      let printer = [
        {"prodescrip": "Pripro1", "problems": "My printer is having a problem"},
        {"prodescrip": "Pripro2", "problems": "I'm experiencing a paper jam with my printer"},
        {"prodescrip": "Others", "problems": "Others"}
      ];
      appendList(printer);
    }
    if (selected3 === "Hardware") {
      let hardware = [
        {"prodescrip": "Hadpro1", "problems": "My computer power cord is not working"},
        {"prodescrip": "Hadpro2", "problems": "My Monitor is not booting on"},
        {"prodescrip": "Others", "problems": "Others"}
      ];
      appendList(hardware);
    }
    
  }
})


// Disable the Problem Description input
    let text_others1 = $("#text_others");
    let selected4 = $("#isSelected1");
      selected4.change(function(event) {
        let selected3 = $("#isSelected1 option:selected").text();
        
        if (selected3 !== "Others") {
          text_others1.val(" ");
          // $("#text_others").attr("placeholder", 'Others')
          text_others1.attr("disabled", true);
        }else{
          text_others1.attr("disabled", false);
          
        }
        
        }
      )
      

      $("#form_helpdesk").submit(function(event){
      let selected = $("#isSelected option:selected").text();
      let selected1 = $("#isSelected1 option:selected").text();
      let text_others = $("#text_others").val();

        let formData = {
          problems: $("#isSelected option:selected").text(),
          problems_des: $("#isSelected1 option:selected").text(),
          others: $("#text_others").val(),
          device_type: $("#device_type").val(),
        };

        // alert(selected + " " + selected1 + " " + text_others)

      if (selected === "Problem Types") {
        $("#isSelected").addClass("w3-red");
        // alert("5")
      }
      else if (selected1 === "Problem Description"){
        $("#isSelected1").addClass("w3-red");
       
      }

      else if (selected1 === "Others" && text_others === "" ) {
        // alert(text_others)
        $("#text_others").addClass("w3-pale-red")
        $("#text_others").attr("placeholder", 'Others is required')

      }
       else {
         $.post("./server/helpdesk_staff.php",formData, function(result, status){
        alert(result);
          selected = ''
          selected1 = ''
          text_others = ''
      });
     
      }

     
     
      })

  $("#logout").on('click',function() {

    $.post("./server/logout.php", function(result, status) {
      // alert("Data: " + result + "\nStatus: " + status);
      location.href = "./index.html"
    })
  })

  });