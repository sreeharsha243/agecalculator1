document.getElementById("ageForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
  
    var birthdateInput = document.getElementById("birthdate");
    var birthdate = new Date(birthdateInput.value);
    var today = new Date();
    var age = today.getFullYear() - birthdate.getFullYear();
  
    // Adjust age if the birthday hasn't occurred yet this year
    if (today.getMonth() < birthdate.getMonth() || (today.getMonth() == birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
      age--;
    }
  
    var resultDiv = document.getElementById("result");
    resultDiv.textContent = "Your age is: " + age + " years ";
  });