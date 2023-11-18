// autocompletion
function autocomplet() {
	var min_length = 2; // nombre de caractère avant lancement recherch 
	var keyword = $('#nom_id').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#nom_list_id').show();
				$('#nom_list_id').html(data);
			}
		});
	} else {
		$('#nom_list_id').hide();
	}
}


// Lors du choix dans la liste
function set_item(item) {
	// change input value
	$('#nom_id').val(item);
	$('#nom2_id').val(item);
	// hide proposition list
	$('#nom_list_id').hide();
}

// autocompletion
function autocomplet2() {
	var min_length = 2; // nombre de caractère avant lancement recherch 
	var keyword = $('#cop_vil_bien').val();  // cop_vil_bien fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh_bien
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh_bien.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#cop_vil_bien_list').show();
				$('#cop_vil_bien_list').html(data);
			}
		});
	} else {
		$('#cop_vil_bien_list').hide();
	}
}

// Lors du choix dans la liste
function set_item_cop_vil_bien(item) {
	// change input value
	$('#cop_vil_bien').val(item);
	// hide proposition list
	$('#cop_vil_bien_list').hide();
}

function autocomplet3(id,list_id) {
	var min_length = 2; // nombre de caractère avant lancement recherch
        var local_id = "#"+id;
        var local_list_id = "#"+list_id;
	var keyword = $(local_id).val();  // cop_vil_bien fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh_bien
	//console.log(local_id+local_list_id+keyword);
    
        if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh_bien.php',
			type: 'POST',
			data: {keyword:keyword,id:id,list_id:list_id},
			success:function(data){
				$(local_list_id).show();
				$(local_list_id).html(data);
			}
		});
	} else {
		$(local_list_id).hide();
	}
}

// Lors du choix dans la liste
function set_item_cop_vil_bien3(item,id,list_id) {
        local_id = "#"+id;
        local_list_id = "#"+list_id;
	// change input value
	$(local_id).val(item);
	// hide proposition list
	$(local_list_id).hide();
}

//console.log("ici");
