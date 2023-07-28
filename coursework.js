var form = document.querySelector('#contactForm');

form.addEventListener('submit', function(event){
  event.preventDefault(); 

  
  var nameInput = document.querySelector('#name');
  var emailInput = document.querySelector('#email');
  var orderInput = document.querySelector('#order');

 
  if (nameInput.value.trim() === '') {
    alert('Please enter your name.');
    nameInput.focus();
    return; 
  }

  var email = emailInput.value.trim();
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (email === '') {
    alert('Please enter your email address.');
    emailInput.focus();
    return;
  } else if (!emailRegex.test(email)) {
    alert('Please enter a valid email address.');
    emailInput.focus();
    return;
  }

  
  if (orderInput.value.trim() === '') {
    alert('Please enter your order.');
    orderInput.focus();
    return;
  }

  form.submit();

});