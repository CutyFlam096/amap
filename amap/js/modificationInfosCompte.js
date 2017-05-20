var letters = /^[A-zÀ-ÿ]+([A-zÀ-ÿ- ')]*[A-zÀ-ÿ])*$/;
var numbers = /^[0-9]+$/;
var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function checkLastName()
{
	var error = false;
	var lastName = document.querySelector('[id^="nom_"]');
	if ( lastName.value.length == 1 || lastName.value == "")
	{
		document.querySelector('[id^="nom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="nom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
		error = true;
	}
	else if ( !lastName.value == "" && !lastName.value.match(letters) )
	{
		document.querySelector('[id^="nom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="nom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
		error = true;
	}
	if (error == false )
	{
		document.querySelector('[id^="nom_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="nom_"]').style.boxShadow = "initial";
	}
};

function checkFirstName()
{
	var error = false;
	var firstName = document.querySelector('[id^="prenom_"]');
	if ( firstName.value.length == 1 || firstName.value == "")
	{
		error = true;
		document.querySelector('[id^="prenom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
	}
	else if ( !firstName.value == "" && !firstName.value.match(letters) )
	{
		error = true;
		document.querySelector('[id^="prenom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
	}
	if (error == false )
	{
		document.querySelector('[id^="prenom_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "initial";
	}
};

function checkLogin()
{
	document.querySelector('[id^="login_"]').style.border = "1px solid #CCC";
	document.querySelector('[id^="login_"]').style.boxShadow = "none";
};

function checkMail()
{
	if( !document.querySelector('[id^="mail_"]').value.match(regexEmail) )
	{
		document.querySelector('[id^="mail_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mail_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Veuillez rentrer un e-mail correct");
	}
	else
	{
		document.querySelector('[id^="mail_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="mail_"]').style.boxShadow = "none";
	}
};

function checkAdresse()
{
	if( document.querySelector('[id^="adresse_"]').value.length < 8 || document.querySelector('[id^="adresse_"]').value == "")
	{
		document.querySelector('[id^="adresse_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="adresse_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Veuillez rentrer une adresse valide.");
	}
	else
	{
		document.querySelector('[id^="adresse_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="adresse_"]').style.boxShadow = "initial";
	}
};

function checkVille()
{
	if(document.querySelector('[id^="ville_"]').value == "")
	{
		document.querySelector('[id^="ville_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="ville_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Veuillez rentrer un ville.");
	}
	else
	{
		document.querySelector('[id^="ville_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="ville_"]').style.boxShadow = "initial";
	}
};

function checkCodePostal()
{
	var error = false;
	var cp = document.querySelector('[id^="code_postal_"]');
	if ( cp.value.length != 5 && cp.value.length > 0 )
	{
		error = true;
		document.querySelector('[id^="code_postal_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre code postal doit comprendre 5 caractères");
	}
	if ( !cp.value == "" && !cp.value.match(numbers) )
	{
		error = true;
		document.querySelector('[id^="code_postal_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre code postal doit ne doit comprendre que des chiffres");
	}
	if ( cp.value == "" || error == false )
	{
		document.querySelector('[id^="code_postal_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "initial";
	}
};

function checkPhone()
{
	var error = false;
	var tel = document.querySelector('[id^="tel_"]');
	if ( tel.value.length != 10 && tel.value.length > 0 )
	{
		error = true;
		document.querySelector('[id^="tel_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="tel_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre numéro de téléphone doit comprendre 10 chiffres");
	}
	if ( !tel.value == "" && !tel.value.match(numbers) )
	{
		error = true;
		document.querySelector('[id^="tel_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="tel_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre numéro de téléphone ne doit comprendre que des chiffres");
	}
	if (error == false )
	{
		document.querySelector('[id^="tel_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="tel_"]').style.boxShadow = "initial";
	}
};

function checkSubmitInfosCompte()
{
	var error = false;
	
	//verif mdp
	if ( document.querySelector('[id^="mdp_"]').value.length < 6 )
	{
		document.querySelector('[id^="mdp_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mdp_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	var pswd1 = document.querySelector('[id^="mdp_"]');
    var pswd2 = document.querySelector('[id^="mdp_"][id$="2"]');
	if ( pswd1.value != pswd2.value || pswd2.value == "" )
	{
		document.querySelector('[id^="mdp_"][id$="2"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mdp_"][id$="2"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}
	
	//verif nom
	var lastName = document.querySelector('[id^="nom_"]');
	if ( lastName.value.length == 1 || lastName.value == "")
	{
		document.querySelector('[id^="nom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="nom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
		error = true;
	}
	else if ( !lastName.value == "" && !lastName.value.match(letters) )
	{
		document.querySelector('[id^="nom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="nom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
		error = true;
	}
	if (error == false )
	{
		document.querySelector('[id^="nom_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="nom_"]').style.boxShadow = "initial";
	}
	
	//verif prenom
	var firstName = document.querySelector('[id^="prenom_"]');
	if ( firstName.value.length == 1 || firstName.value == "")
	{
		error = true;
		document.querySelector('[id^="prenom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
	}
	else if ( !firstName.value == "" && !firstName.value.match(letters) )
	{
		error = true;
		document.querySelector('[id^="prenom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
	}
	if (error == false )
	{
		document.querySelector('[id^="prenom_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "initial";
	}
	
	//verif mail
	if( !document.querySelector('[id^="mail_"]').value.match(regexEmail) )
	{
		document.querySelector('[id^="mail_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mail_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Veuillez rentrer un e-mail correct");
	}
	else
	{
		document.querySelector('[id^="mail_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="mail_"]').style.boxShadow = "none";
	}
	
	//varif adresse
	if( document.querySelector('[id^="adresse_"]').value.length < 8 || document.querySelector('[id^="adresse_"]').value == "")
	{
		document.querySelector('[id^="adresse_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="adresse_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Veuillez rentrer une adresse valide.");
	}
	else
	{
		document.querySelector('[id^="adresse_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="adresse_"]').style.boxShadow = "initial";
	}
	
	//verif ville_
	if(document.querySelector('[id^="ville_"]').value == "")
	{
		document.querySelector('[id^="ville_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="ville_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Veuillez rentrer un ville.");
	}
	else
	{
		document.querySelector('[id^="ville_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="ville_"]').style.boxShadow = "initial";
	}
	
	//verif cp
	var cp = document.querySelector('[id^="code_postal_"]');
	if ( cp.value.length != 5 && cp.value.length > 0 )
	{
		error = true;
		document.querySelector('[id^="code_postal_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre code postal doit comprendre 5 caractères");
	}
	if ( !cp.value == "" && !cp.value.match(numbers) )
	{
		error = true;
		document.querySelector('[id^="code_postal_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre code postal doit ne doit comprendre que des chiffres");
	}
	if ( cp.value == "" || error == false )
	{
		document.querySelector('[id^="code_postal_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "initial";
	}
	
	//varif phone
	var tel = document.querySelector('[id^="tel_"]');
	if ( tel.value.length != 10 && tel.value.length > 0 )
	{
		error = true;
		document.querySelector('[id^="tel_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="tel_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre numéro de téléphone doit comprendre 10 chiffres");
	}
	if ( !tel.value == "" && !tel.value.match(numbers) )
	{
		error = true;
		document.querySelector('[id^="tel_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="tel_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Votre numéro de téléphone ne doit comprendre que des chiffres");
	}
	if (error == false )
	{
		document.querySelector('[id^="tel_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="tel_"]').style.boxShadow = "initial";
	}
	
	
	if ( error == true )
	{
		alert("Champ(s) non rempli(s) ou incorrect(s)");
		return false;
	}
	else
	{
		return true;
	}
};

function resetColors()
{
	for ( var i = 0 ; i < document.getElementsByClassName("reset").length ; i++ )
	{
		document.getElementsByClassName("reset")[i].style.borderColor = "initial";
		document.getElementsByClassName("reset")[i].style.boxShadow = "initial";
	}
}
