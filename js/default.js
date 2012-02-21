$(document).ready(function() {
	oTable = $('#listDemands').dataTable({
		"bJQueryUI": true,
		"bInfo": false,
		"bLengthChange": false,
		"bFilter": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 10,
		"oLanguage": {
			"oPaginate": {
				"sFirst": "Debut",
				"sPrevious": "Precedent",
				"sNext": "Suivant",
				"sLast": "Fin"
			},
			"sEmptyTable": "Aucune demande pour le moment.",
			"sSearch": "Filtre: ",
			"sZeroRecords": "Aucun resultat"
		}
	});
	oTable = $('#listServers').dataTable({
		"bJQueryUI": true,
		"bInfo": false,
		"bLengthChange": false,
		"bFilter": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 40,
		"oLanguage": {
			"oPaginate": {
				"sFirst": "Debut",
				"sPrevious": "Precedent",
				"sNext": "Suivant",
				"sLast": "Fin"
			},
			"sEmptyTable": "Aucun serveur pour le moment.",
			"sSearch": "Filtre: ",
			"sZeroRecords": "Aucun resultat"
		}
	});
	$('#logoutLink').click(function (event) {
		event.preventDefault();
		$.get( 'functions/logout.php' );
		$(location).attr('href', '/login');
	});
} );
