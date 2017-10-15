              $(document).ready(function(){
               $("#employeeBugPage").change(function(){
                var option=$("#employeeBugPage").val();
                if(!option){$("#error-project-retrive").html("<h3 style='color:red;text-align:center'>Please Select a Project.</h3>")}
                else{
                     $("#formtabledata").css("display",'block');                    }
              });
          });
                               
    $(document).ready(function(){
        $("#bugSeverity").click(function(){
           
            $("#paraHeader").show();
        });
    });   
    
  $(document).ready(function(){
      $("#bugStatus").change(function(){
          var bugstatus=$("#bugStatus").val();
          if(bugstatus=="Resolved"){
              $(".bugReviewRow").show();
              $(".bugPriority").hide();
              $("#bugReview").prop("required","true");
          }
          else{
              $(".bugReviewRow").hide();
              $(".bugPriority").show();
              $("#bP").prop("required","true");
          }
      });
  });  
                    
     function addBug(){
        
        $("#formtabledata").on("submit",function(e){
                        e.preventDefault();
                       $(document).ready(function(){ 
                           alert("you are in bug update function");
                           var projectid=$("#employeeBugPage").val();
                          var bugname=$("#bugName").val();
                          var severity=$("#bugSeverity").val();
                          var bugstatus=$("#bugStatus").val();
                          
                          if(bugstatus=="Resolved"){var bugfield=$("#bugReview").val();}
                          else{var bugfield=$("#bP").val();}
                         alert("bug name="+bugname+",severity="+severity+",status="+bugstatus+",Bugfield="+bugfield);
                          $.ajax({
                                url: 'addbug.php',
                                type: 'POST',
                                data: "projectid="+projectid+"&bugname=" + bugname +"&severity="+severity+"&status=" + bugstatus+"&bugfield="+bugfield,
                                dataType: 'json',
                                success: function (data){
                                    if(data=="success"){
                                        $("#projectSelection").html("<h3 style='text-align: center;color: darkgray;font-family: serif;color: #3ab92c;'>New Bug has been addedd Successfully.</h3>");
                                        setTimeout(function() {window.location.reload()},1500);
                                    }
                                    else{
                                        $("#projectSelection").html("<h3 style='text-align: center;color: darkgray;font-family: serif;color: red;'>Failed to add the Bug Please try again.</h3>");
                                        setTimeout(function() {window.location.reload()},1500);
                                    }
                                }
                          });
                      
                });
          });
     }
     
    function mFunction(id,arrow,pb) {
    var x = document.getElementById(id);
    var y = document.getElementById(arrow);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        y.className += "glyphicon glyphicon-triangle-bottom";
        $(pb).css('color','ghostwhite');
    } else { 
        x.className = x.className.replace(" w3-show", "");
        y.className += "glyphicon glyphicon-triangle-right";
        $(pb).css('color','');
    }
}


