
$(document).ready(function() {
    
    $('#contactForm').submit(function(event) {
      event.preventDefault(); 
  
      
      var formData = $(this).serialize();
  
     
      $.ajax({
        type: 'POST',
        url: 'dataprocess.php', 
        data: formData,
        success: function(response) {
        
          console.log(response);
          alert('Form submitted successfully!');
        },
        error: function(xhr, status, error) {
          
          console.log(xhr.responseText);
          alert('Form submission failed. Please try again later.');
        }
      });
    });
  });