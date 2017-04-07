var letters = /^[A-zÀ-ÿ]+([A-zÀ-ÿ- ')]*[A-zÀ-ÿ])*$/;
var numbers = /^[0-9]+$/;

function libelleProduit()
{
	var error = false;
	var libelle_produit = document.querySelector('[id="libelle_produit"]');
	if ( libelle_produit.value.length == 1 )
	{
		document.querySelector('[id="libelle_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="libelle_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
		error = true;
	}
	else if ( !libelle_produit.value == "" && !libelle_produit.value.match(letters) )
	{
		document.querySelector('[id="libelle_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="libelle_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
		error = true;
	}
	if ( libelle_produit.value == "" || error == false )
	{
		document.querySelector('[id="libelle_produit"]').style.border = "1px solid #CCC";
		document.querySelector('[id="libelle_produit"]').style.boxShadow = "initial";
	}
};

function descriptionProduit()
{
	var error = false;
	var description_produit = document.querySelector('[id="description_produit"]');
	
	if (description_produit.value.length < 10)
	{
		document.querySelector('[id="description_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="description_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 10 caractères");
		error = true;
	}
	if ( description_produit.value == "" || error == false )
	{
		document.querySelector('[id="description_produit"]').style.border = "1px solid #CCC";
		document.querySelector('[id="description_produit"]').style.boxShadow = "initial";
	}
};

function puProduit()
{
	var error = false;
	var pu_produit = document.querySelector('[id="pu_produit"]');
	
	if (!pu_produit.value.match(numbers) )
	{
		document.querySelector('[id="pu_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="pu_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des chiffres");
		error = true;
	}
	if ( pu_produit.value == "" || error == false )
	{
		document.querySelector('[id="pu_produit"]').style.border = "1px solid #CCC";
		document.querySelector('[id="pu_produit"]').style.boxShadow = "initial";
	}
};

function qteProduit()
{
	var error = false;
	var quantite_produit = document.querySelector('[id="quantite_produit"]');
	
	if (!quantite_produit.value.match(numbers) )
	{
		document.querySelector('[id="quantite_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="quantite_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des chiffres");
		error = true;
	}
	if ( quantite_produit.value == "" || error == false )
	{
		document.querySelector('[id="quantite_produit"]').style.border = "1px solid #CCC";
		document.querySelector('[id="quantite_produit"]').style.boxShadow = "initial";
	}
};

function imageProduit()
{
    var error = false;
	var image_produit = document.querySelector('[id="image_produit"]');
	
	 if(image_produit.length == 0)
	 {
		alert("Ce champ doit contenir une image.");
		var error = true;
	 }
};

function checkSubmitProduit()
{
	var error = false;
	var libelle_produit = document.querySelector('[id="libelle_produit"]');
	if ( libelle_produit.value.length == 1 )
	{
		document.querySelector('[id="libelle_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="libelle_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
		error = true;
	}
	else if ( !libelle_produit.value == "" && !libelle_produit.value.match(letters) )
	{
		document.querySelector('[id="libelle_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="libelle_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
		error = true;
	}
	if ( libelle_produit.value == "" || error == false )
	{
		document.querySelector('[id="libelle_produit"]').style.border = "1px solid #CCC";
		document.querySelector('[id="libelle_produit"]').style.boxShadow = "initial";
	}
	
	var description_produit = document.querySelector('[id="description_produit"]');
<<<<<<< HEAD
	
	if (description_produit.value.length < 10)
=======
	if ( description_produit.value.length < 10)
>>>>>>> edadd1426db1abb94c421838ff8a0a6c56ba6901
	{
		document.querySelector('[id="description_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="description_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 10 caractères");
		error = true;
	}
	if ( description_produit.value == "" || error == false )
	{
		document.querySelector('[id="description_produit"]').style.border = "1px solid #CCC";
		document.querySelector('[id="description_produit"]').style.boxShadow = "initial";
	}
	
	var pu_produit = document.querySelector('[id="pu_produit"]');
	
	if (!pu_produit.value.match(numbers) )
	{
		document.querySelector('[id="pu_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="pu_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des chiffres");
		error = true;
	}
	if ( pu_produit.value == "" || error == false )
	{
		document.querySelector('[id="pu_produit"]').style.border = "1px solid #CCC";
		document.querySelector('[id="pu_produit"]').style.boxShadow = "initial";
	}
	
	var quantite_produit = document.querySelector('[id="quantite_produit"]');
	
	if (!quantite_produit.value.match(numbers) )
	{
		document.querySelector('[id="quantite_produit"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id="quantite_produit"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des chiffres");
		error = true;
	}
	if ( quantite_produit.value == "" || error == false )
	{
		document.querySelector('[id="quantite_produit"]').style.border = "1px solid #CCC";
		document.querySelector('[id="quantite_produit"]').style.boxShadow = "initial";
	}
	
	var image_produit = document.querySelector('[id="image_produit"]');
	
	if(image_produit.length == 0)
	{
		alert("Ce champ doit contenir une image en JPG, jpg, jpeg, jpe ou png.");
		var error = true;
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
