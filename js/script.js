// autocompletion
function autocompletbien(id,list_id) {
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
function set_item_cop_vil_bien(item,id,list_id) {
        local_id = "#"+id;
        local_list_id = "#"+list_id;
	// change input value
	$(local_id).val(item);
	// hide proposition list
	$(local_list_id).hide();
}

function autocompletclient(id,list_id) {
	var min_length = 2; // nombre de caractère avant lancement recherch
        var local_id = "#"+id;
        var local_list_id = "#"+list_id;
	var keyword = $(local_id).val();  // cop_vil_client fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh_client
	//console.log(local_id+local_list_id+keyword);
    
        if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh_client.php',
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
function set_item_cop_vil_client(item,id,list_id) {
        local_id = "#"+id;
        local_list_id = "#"+list_id;
	// change input value
	$(local_id).val(item);
	// hide proposition list
	$(local_list_id).hide();
}

