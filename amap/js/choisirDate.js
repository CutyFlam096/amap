var letters = /^[A-zÀ-ÿ]+([A-zÀ-ÿ- ')]*[A-zÀ-ÿ])*$/;
var numbers = /^[0-9]+$/;
var numbersFloat =/^\d{0,2}(?:\.\d{0,2}){0,1}$/;
var date= /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;

function verifDateLivraison()
{
	var error = false;
	var date_livraison = document.querySelector('[id="datepicker"]');
	
	if (!date_livraison.value.match(date))
	{
		document.querySelector('[id="datepicker"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="datepicker"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer une date valide au format jj/mm/yyyy.");
		error = true;
	}
	if ( date_livraison.value == "" || error == false )
	{
		document.querySelector('[id="description_produit_modif"]').style.border = "1px solid #CCC";
		document.querySelector('[id="description_produit_modif"]').style.boxShadow = "initial";
		alert("Vous devez rentrer une date.");
	}
};

function checkSubmitDateLivraison()
{
	var error = false;
	var date_livraison = document.querySelector('[id="datepicker"]');
	
	if (!date_livraison.value.match(date))
	{
		document.querySelector('[id="datepicker"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="datepicker"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer une date valide au format jj/mm/yyyy.");
		error = true;
		return false;
	}
	if ( date_livraison.value == "" || error == false )
	{
		document.querySelector('[id="description_produit_modif"]').style.border = "1px solid #CCC";
		document.querySelector('[id="description_produit_modif"]').style.boxShadow = "initial";
		alert("Vous devez rentrer une date.");
		return false;
	}
	
	return true;
};

function resetColors()
{
	for ( var i = 0 ; i < document.getElementsByClassName("reset").length ; i++ )
	{
		document.getElementsByClassName("reset")[i].style.borderColor = "initial";
		document.getElementsByClassName("reset")[i].style.boxShadow = "initial";
	}
}
