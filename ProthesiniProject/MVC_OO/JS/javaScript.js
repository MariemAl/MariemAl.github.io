function validation(champ)
{
if(champ.nom.value.length<3){
alert ('Veuillez saisir le nom ');
champ.nom.focus();
return false;
}else if (champ.prenom.value.length<3){
alert ('Veuillez saisir le prenom ');
champ.prenom.focus();
return false;
} else if  (champ.adresse.value.length<3){
alert ('Veuillez adresse le email');
champ.email.focus();
return false;
}  else if  ( champ.email.value.lenght<3){
alert ('Veuillez email le numero');
champ.num.focus();
return false;
}else{
return true ;
}
}
function validatePassword(password: String): Boolean = {
 if (password.length < 8)
   return false

 var lower = false
 var upper = false
 var numbers = false
 var special = false

 password.foreach { c =>
   if (c.isDigit)       numbers = true
   else if (c.isLower)  lower = true
   else if (c.isUpper)  upper = true
   else                 special = true
 }

 lower && upper && numbers && special
}
String pattern = "^(?=(.*\d){1})(.*\S)(?=.*[a-zA-Z\S])[0-9a-zA-Z\S]{8,}";
String password_string = "Type the password here"

private boolean isValidPassword(String password_string) {
   return password_string.matches(Constants.passwordPattern);
}
