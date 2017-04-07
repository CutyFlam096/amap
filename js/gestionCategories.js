var letters = /^[A-zÀ-ÿ]+([A-zÀ-ÿ- ')]*[A-zÀ-ÿ])*$/;

function checkCategory()
{
	var error = false;
	var category = document.querySelector('[id^="category_name"]');
	if ( category.value.length == 1 )
	{
		document.querySelector('[id^="category_name"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="category_name"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
		error = true;
	}
	else if ( !category.value == "" && !category.value.match(letters) )
	{
		document.querySelector('[id^="category_name"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="category_name"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
		error = true;
	}
	if ( category.value == "" || error == false )
	{
		document.querySelector('[id^="category_name"]').style.border = "1px solid #CCC";
		document.querySelector('[id^="category_name"]').style.boxShadow = "initial";
	}
};

function checkSubmit()
{
	var error = false;

	var category = document.querySelector('[id^="category_name"]');
	if ( category.value.length <= 1 )
	{
		document.querySelector('[id^="category_name"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="category_name"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Vous devez rentrer au moins 2 caractères");
		error = true;
	}
	else if ( !category.value == "" && !category.value.match(letters) )
	{
		document.querySelector('[id^="category_name"]').style.borderColor = "rgba(255, 0, 0, 1)";
		document.querySelector('[id^="category_name"]').style.boxShadow = "0 0 8px rgba(255, 0, 0, 1)";
		alert("Ce champ doit contenir seulement des lettres");
		error = true;
	}

	if ( error == true )
	{
		alert("Champ non rempli ou incorrect");
		return false;
	}
	else
	{
		return true;
	}
};