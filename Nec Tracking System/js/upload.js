$(document).ready(function(event){
    $.post("server/login_session.php", function(data, status) {
        if (data == 0) {
            location.href = "./index.html"
        }
    })

    $("#memo_form").submit(function(event){

let memo_heading = {memo_heading: $("#memo_heading").val()}
        var fd = new FormData(this);
       
        $.ajax({
            url: 'server/upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                // alert(response)
                if(response == 0){
                    alert('File already exist');
                }
                else if(response ==1){
                    alert('File Uploaded');
                    $("#memo_heading").val('')
                    $("#memo_file").val('')
                    $("#mdate").val('')
                }else if(response ==2){
                    alert('File Too large');
                }else if(response ==3){
                    alert('Sorry, only PDF, DOCX, PNG & RTF files are allowed.');
                }else{
                    alert('File was not uploaded');
                }
            },
        });
    });

    $("#logout").on('click',function() {

        $.post("server/logout.php", function(result, status) {
            // alert("Data: " + result + "\nStatus: " + status);
            location.href = "./index.html"
        })
    })
})