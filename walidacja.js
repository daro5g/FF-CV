function walidacjaEmail(address)
{
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
if(reg.test(address) == false) {
return false;
}
else
{
return true;
}
}

function walidacja(AForm)
{
var tekst='';

if ((!AForm.imie.value) || (AForm.imie.value.length < 2) || (AForm.imie.value.length > 10)){
tekst=tekst+"Wpisz swoje imię(min 2 znaki, max 10 znaków)\n";
}

if ((!AForm.nazwisko.value) || (AForm.nazwisko.value.length < 3) || (AForm.nazwisko.value.length > 20)){
tekst=tekst+"Wpisz swoje nazwisko (min 3 znaki, max 20 znaków)\n";
}

if (!walidacjaEmail(AForm.email.value))
{
tekst=tekst+"Format adresu e-mail jest nie poprawny\n";
}

if (!AForm.imie.value){
tekst=tekst+"Wypełnij pole tekstowe\n";
}
if (tekst!="") 
{
alert ("NIE POPRAWNIE WPISANE DANE\n"+tekst);
return false;
}
 else 

{
return true;
}
}
