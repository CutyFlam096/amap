$(document).ready(function()
{
	//clique sur le bouton accueil affiche la page d'accueil
    $('#accueil').on('click', function(){ 
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_page_accueil.php',
            type : 'GET',
            dataType : 'html',

            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });

	//pour afficher categorie au passage de la souris sur le bouton produit
	$('#produit').on('mouseover', function(){
		$('#menucateg').addClass('open');
				}).on('mouseleave', function(){
		setTimeout(function(){
			$('#menucateg').removeClass('open');

		},2500);
	});
	
	//si on clique sur une cat, cela affiche els produit de la cat
    $('li[id^="cat"]').on('click',function(){
        var box = $('#corps');
		
        $.ajax({
            url: 'modele/ajax_page_produit.php',
            type : 'GET',
            dataType : 'text',
			data : 'categ=' + this.id.charAt(3),
            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
	
	//affiche tous les produit au click sur le bouton produit
	$('#produit').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_page_produit.php?categ=0',
            type : 'GET',
            dataType : 'text',
            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
    
	//affiche page connexion producteur au click sur le bouton producteur
    $('#producteurs').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_page_producteurs.php',
            type : 'GET',
            dataType : 'html',
            success: function (data) {
                box.html(data);
				
				//affiche page inscription producteur au click sur le "Pas de compte producteur? Cliquez ici!"
				$('#inscription_producteur').on('click',function(){
				var box = $('#corps');
				$.ajax({
					url: 'modele/ajax_inscription_producteurs.php',
					type : 'GET',
					dataType : 'html',
					success: function (data) {
						box.html(data);
					},
					error: function() {
						box.html("Désolé, aucun résultat trouvé.");
					}
					});
				});
	
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
    
	//affiche page connexion producteur au click sur le bouton consommateurs
    $('#consommateurs').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_page_consommateurs.php',
            type : 'GET',
            dataType : 'html',
            success: function (data) {
                box.html(data);
				
				//affiche page inscription consommateurs au click sur le "Pas de compte consommateurs? Cliquez ici!"
				$('#inscription_consommateur').on('click',function(){
				var box = $('#corps');
				$.ajax({
					url: 'modele/ajax_inscription_consommateurs.php',
					type : 'GET',
					dataType : 'html',
					success: function (data) {
						box.html(data);
					},
					error: function() {
						box.html("Désolé, aucun résultat trouvé.");
					}
					});
				});
				
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
	
	//dans l'espace consommateur, affiche els information du compte au click sur le bouton informations compte
	$('#info_consommateur').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_info_util.php',
            type : 'GET',
            dataType : 'html',
            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
	
	$('#info_producteur').on('click',function(){
        var box = $('#corps');
        $.ajax({
            url: 'modele/ajax_info_util.php',
            type : 'GET',
            dataType : 'html',
            success: function (data) {
                box.html(data);
            },
            error: function() {
                box.html("Désolé, aucun résultat trouvé.");
            }
        });
    });
});

