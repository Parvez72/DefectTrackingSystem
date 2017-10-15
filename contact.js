$('.contact').on('submit', function(e){
    e.preventDefault();
    var dataIn = $(this).serialize(); //serialize turns the form data into a string that can be passed to mail.php. Try doing alert(dataIn); to see what it holds.
  
     var $this = $(this),
    $state = $this.find('button > .state');
  $this.addClass('loading');
  $state.html('Submitting');
  
        $.post( "mail.php", dataIn )
        .done(function( dataOut )
        {
         
        //dataOut holds the response from mail.php. The response would be any html mail.php outputs. I typically echo out json encoded arrays as responses that you can parse here in the jQuery.
        var myArray = JSON.parse(dataOut );
        
        if (myArray=="true") //Check if it was successfull.
            {
             
            
    setTimeout(function() {
    $this.addClass('ok');
    $state.html('Message submitted Successfully');
    setTimeout(function() {
      $state.html('');
      $this.removeClass('ok loading');
    }, 4000);
    setTimeout(function(){
     
         window.location.reload();
         /* or window.location = window.location.href; */
     
}, 2000);
  }, 3000);
 
            }
        else //there were errors
           { 
           $('.contact').html("<h1>There was a problem.Please try</h1>"); //Clear error span

            $.each(myArray['errors'], function(i){ 
            $('#error').append(myArray['errors'][i] + "<br>");
           });
        }
       
});

 return false; //Make sure you do this or it will submit the form and redirect
  
});