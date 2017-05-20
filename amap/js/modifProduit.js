var letters = /^[A-zÀ-ÿ]+([A-zÀ-ÿ- ')]*[A-zÀ-ÿ])*$/;
var numbers = /^[0-9]+$/;
var numbersFloat =/^\d{0,2}(?:\.\d{0,2}){0,1}$/;

function descriptionProduitModif()
{
	var error = false;
	var description_produit = document.querySelector('[id="description_produit_modif"]');
	
	if (description_produit.value.length < 10)
	{
		document.querySelector('[id="description_produit_modif"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="description_produit_modif"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 10 caractères");
		error = true;
	}
	if ( description_produit.value == "" || error == false )
	{
		document.querySelector('[id="description_produit_modif"]').style.border = "1px solid #CCC";
		document.querySelector('[id="description_produit_modif"]').style.boxShadow = "initial";
	}
};

function puProduitModif()
{
	var error = false;
	var pu_produit = document.querySelector('[id="pu_produit_modif"]');
	
	if (!pu_produit.value.match(numbersFloat) )
	{
		document.querySelector('[id="pu_produit_modif"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="pu_produit_modif"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des chiffres");
		error = true;
	}
	if ( pu_produit.value == "" || error == false )
	{
		document.querySelector('[id="pu_produit_modif"]').style.border = "1px solid #CCC";
		document.querySelector('[id="pu_produit_modif"]').style.boxShadow = "initial";
	}
};

function qteProduitModif()
{
	var error = false;
	var quantite_produit = document.querySelector('[id="quantite_produit_modif"]');
	
	if (!quantite_produit.value.match(numbers) )
	{
		document.querySelector('[id="quantite_produit_modif"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="quantite_produit_modif"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des chiffres");
		error = true;
	}
	if ( quantite_produit.value == "" || error == false )
	{
		document.querySelector('[id="quantite_produit_modif"]').style.border = "1px solid #CCC";
		document.querySelector('[id="quantite_produit_modif"]').style.boxShadow = "initial";
	}
};

function checkSubmitProduitModif()
{
	var error = false;
	var description_produit = document.querySelector('[id="description_produit_modif"]');
	
	if (description_produit.value.length < 10)
	{
		document.querySelector('[id="description_produit_modif"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="description_produit_modif"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 10 caractères");
		error = true;
	}
	if ( description_produit.value == "" || error == false )
	{
		document.querySelector('[id="description_produit_modif"]').style.border = "1px solid #CCC";
		document.querySelector('[id="description_produit_modif"]').style.boxShadow = "initial";
	}
	
	var pu_produit = document.querySelector('[id="pu_produit_modif"]');
	
	if (!pu_produit.value.match(numbersFloat) )
	{
		document.querySelector('[id="pu_produit_modif"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="pu_produit_modif"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des chiffres");
		error = true;
	}
	if ( pu_produit.value == "" || error == false )
	{
		document.querySelector('[id="pu_produit_modif"]').style.border = "1px solid #CCC";
		document.querySelector('[id="pu_produit_modif"]').style.boxShadow = "initial";
	}
	
	var quantite_produit = document.querySelector('[id="quantite_produit_modif"]');
	
	if (!quantite_produit.value.match(numbers) )
	{
		document.querySelector('[id="quantite_produit_modif"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="quantite_produit_modif"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des chiffres");
		error = true;
	}
	if ( quantite_produit.value == "" || error == false )
	{
		document.querySelector('[id="quantite_produit_modif"]').style.border = "1px solid #CCC";
		document.querySelector('[id="quantite_produit_modif"]').style.boxShadow = "initial";
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
