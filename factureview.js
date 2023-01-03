let facturechecker = document.getElementById('factureCheck');
let facturing = document.getElementById('facturing');

if (facturechecker.innerHTML.includes('vo')) {
    facturing.style.display = "block";
  } else {
    facturing.style.display = "none";    
  }