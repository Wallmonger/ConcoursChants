let userid = document.getElementById('identifiant');
let useremail = document.getElementById('email');
let userpassword = document.getElementById('password');
let userconfirmpassword = document.getElementById('confirmPassword');
let userlastname = document.getElementById('nom');
let userfirstname = document.getElementById('firstname');


function emailVerify() {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  
    if (useremail.value.match(validRegex)) {
         return true;
    } else {
      useremail.style.border = "2px solid red";
      alert("Email Incorrect")
      return false; 
    }
  
  }


  function checkPasswordEquality () {
    if (userpassword.value != userconfirmpassword.value) {
        
        userconfirmpassword.style.border = "2px solid blue"
        alert("les mots de passe ne correspondent pas")
        return false;
        
    } else {
        return true;
    }
}



