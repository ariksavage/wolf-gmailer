function save_settings(){
  const gmailerForm = document.forms["gmailer"];
  if (gmailerForm["pass1"].value != gmailerForm["pass2"].value){
    alert ("passwords must match");
    return false;
  }
  gmailerForm.submit();
}
function confirmPassword(){
  const gmailerForm = document.forms["gmailer"];
  if (gmailerForm["pass1"].value == ""){
    gmailerForm["pass2"].parentNode.className = gmailerForm["pass2"].parentNode.className + " hidden";
  } else {
    gmailerForm["pass2"].parentNode.className = gmailerForm["pass2"].parentNode.className.replace("hidden", "").trim();
  }
}
