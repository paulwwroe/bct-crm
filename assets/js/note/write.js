$(document).ready(function(){

  	$("#write-a-note-client_name").on("focus click", function(){
    	$(".ui-menu-item").hide();
    	$(this).val("");
    	$("#write-a-note-client_id_copy").text("");
    });

    $("#write-a-note-client_name").keyup(function(){
    	if ($(this).val().length === 0) {
    		$("#write-a-note-client_id_copy").text("");
    	}
    });

	$("#write-a-note-client_name").autocomplete({
		
		minLength: 2,

		source: function(request, response) {

			$.ajax({
				
				url: "../client/getSuggestions",
				
				dataType: "json",
				
				data: {
					query: request.term,
					fields: 'client_id, forename, surname'
				},

				success: function(data) {
					
					console.log(data);
					
					response(data);

				}

			});

		},
		
		select: function(event, ui) {
			
			$("#write-a-note-client_id").val(ui.item.client_id);

			$("#write-a-note-client_name").val(ui.item.forename + ' ' + ui.item.surname);

			$("#write-a-note-client_id_copy").text(ui.item.client_id);

			return false;

		}
	
	}).autocomplete("instance")._renderItem = function( ul, item ) {
		return $("<li>").append( item.forename + ' ' + item.surname + "(" + item.client_id + ")").appendTo(ul);
	};


	var $output = $("#write-a-note-errors");

	$("#write-a-note-form").submit(function(event){

		event.preventDefault();

		$output.find("ul").empty();

		$output.hide();

		var errors = [];

		$(this).find(".required").each(function(){

			if($(this).val().trim().length === 0) {

				errors.push({
					"title" : $(this).attr("title"),
					"message" : " is required."
				});

			}

		});

		if (errors.length > 0) {

			$.each(errors, function(key, value){

				$output.find("ul").append(
					"<li>" +
						errors[key].title + errors[key].message
					+ "</li>"
				);

			});

			$output.show();

		} else {

			$.ajax({
				
				url: "create",
				
				type: "POST",
				
				data: $("#write-a-note-form").serialize(),
				
				dataType: "json",
				
				statusCode: {
					
					200: function(xhr) {

						console.log(xhr.responseText);

						var message = 'Your message has been saved successfully.';

						window.location.href = '../note/?success=' + message;

					},

					500: function(xhr){

						console.log(xhr);

					}

				}

			});

		}

	});

});