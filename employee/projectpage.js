              $(document).ready(function(){
               $("#employee").change(function(){
                var option=$("#employee").val();
                if(!option){$("#error-project-retrive").html("<h3 style='color:red;text-align:center'>Please Select a Project.</h3>")}
                else{
                   $.ajax({
                    
                    url: 'data.php',
                    type: 'POST',
                    data : {option},
                    dataType: 'json',
                    success: function (data){
                       
                        $("#tabledata").css("display",'block')
                        if(data=="fail"){$("#error-project-retrive").html("<h3 style='color:red;text-align:center'>Data couldn't be retrived.</h3>")}
                        else{
                        
                        $("#first-row").html("<td>"+data['id']+"</td><td>"+data["projectName"]+"</td><td>"+data["projectStatus"]+"</td>");
                        $("#second-row").html("<td>"+data['totalBugs']+"</td><td>"+data["bugsResolved"]+"</td><td>"+data["bugsUnresolved"]+"</td>");
                        $("#third-row").html("<td>"+data['projectAssignDate']+"</td><td>"+data["projectSubmitDate"]+"</td>");
                    }
                    }
                    });
                    }
              });
          });
          
          
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


$(document).ready(function() {
  var opt = '';
  var sta = '';
  $("#updateStatus").change(function() {
     opt = $("#updateStatus").val();
  });

  $("#updateStatus1").change(function() {
     sta = $("#updateStatus1").val();
     callAjax(opt,sta);
  });
});

function callAjax(opt,sta) {
 
  $.ajax({
    url: 'updatecode.php',
    type: 'POST',
    data: "opt=" + opt + "&sta=" + sta,
    dataType: 'json',
    success: function(data) {
      
      if(data=="true"){ setTimeout(function() {window.location.reload()},2000);
   
          $("#projectupdate").html("<h3 style='color:green;text-align:center'><span class='glyphicon glyphicon-ok'>&nbsp;</span>Status has been changed successfully.</h3>");}
      else{setTimeout(function() {window.location.reload()},2000);
          $("#projectupdate").html("<h3 style='color:red;text-align:center'><span class='glyphicon glyphicon-remove'>&nbsp;</span>Status Couldn't be changed try again.</h3>")}
    }
    
  });

}