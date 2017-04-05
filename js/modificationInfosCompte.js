var letters = /^[A-zÀ-ÿ]+([A-zÀ-ÿ- ')]*[A-zÀ-ÿ])*$/;
var numbers = /^[0-9]+$/;
var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function checkLastName()
{
	var error = false;
	var lastName = document.querySelector('[id^="nom_"]');
	if ( lastName.value.length == 1 )
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
	if ( lastName.value == "" || error == false )
	{
		document.querySelector('[id^="nom_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="nom_"]').style.boxShadow = "initial";
	}
};

function checkFirstName()
{
	var error = false;
	var firstName = document.querySelector('[id^="prenom_"]');
	if ( firstName.value.length == 1 )
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
	if ( firstName.value == "" || error == false )
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

function checkPswd()
{
	var error = false;
	var pswd = document.querySelector('[id^="mdp_"]');
	if( !pswd.value == "" && pswd.value.length < 6 )
	{
		error = true;
		document.querySelector('[id^="mdp_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mdp_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 6 caractères");
	}
	if ( pswd.value == "" || error == false )
	{
		document.querySelector('[id^="mdp_"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="mdp_"]').style.boxShadow = "initial";
	}
};

function checkSamePswd()
{
    var pswd1 = document.querySelector('[id^="mdp_"]');
    var pswd2 = document.querySelector('[id^="mdp_"][id$="2"]');
    if( !pswd1.value == "" && pswd1.value != pswd2.value )
    {
    	document.querySelector('[id^="mdp_"][id$="2"]').style.borderColor = "rgba(255, 0, 0, 1)";
			document.querySelector('[id^="mdp_"][id$="2"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
      alert("Veuillez rentrer le même mot de passe que celui rentré précédemment");
    }
    else
    {
    	document.querySelector('[id^="mdp_"][id$="2"]').style.border = "1px solid #CCC";
			document.querySelector('[id^="mdp_"][id$="2"]').style.boxShadow = "initial";
    }
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
	document.querySelector('[id^="adresse_"]').style.border = "1px solid #CCC";
	document.querySelector('[id^="adresse_"]').style.boxShadow = "initial";
};

function checkVille()
{
	document.querySelector('[id^="ville_"]').style.border = "1px solid #CCC";
	document.querySelector('[id^="ville_"]').style.boxShadow = "initial";
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
	document.querySelector('[id^="tel_"]').style.border = "1px solid #CCC";
	document.querySelector('[id^="tel_"]').style.boxShadow = "initial";
};

function checkSubmit()
{
	var error = false;

	if ( document.querySelector('[id^="nom_"]').value == "" || document.querySelector('[id^="nom_"]').value.length < 2 || !document.querySelector('[id^="nom_"]').value.match(letters) )
	{
		document.querySelector('[id^="nom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="nom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="prenom_"]').value == "" || document.querySelector('[id^="prenom_"]').value.length < 2 || !document.querySelector('[id^="prenom_"]').value.match(letters) )
	{
		document.querySelector('[id^="prenom_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="prenom_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="login_"]').value == "" )
	{
		document.querySelector('[id^="login_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="login_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

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

	if ( !document.querySelector('[id^="mail_"]').value.match(regexEmail) )
	{
		document.querySelector('[id^="mail_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="mail_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="adresse_"]').value == "" )
	{
		document.querySelector('[id^="adresse_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="adresse_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="ville_"]').value == "" )
	{
		document.querySelector('[id^="ville_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="ville_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="code_postal_"]').value == "" )
	{
		document.querySelector('[id^="code_postal_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="code_postal_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
	}

	if ( document.querySelector('[id^="tel_"]').value == "" )
	{
		document.querySelector('[id^="tel_"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="tel_"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		error = true;
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
