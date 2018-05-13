$(document).ready(function(){

	$("#note-filters-form").on("change", function(){
		console.log($("#note-filters-form").serialize());
	});

	var restoreDefaults = function() {
		$("#write-a-note_details, #write-a-note_client").val("");
		$("#write-a-note_client_id_copy").text("");
	};

	var getNotes = function() {

		$.ajax({

			url: "getNotes",

			type: "GET",

			beforeSend: function() {

				$("#loader").show();

			},

			success: function(){

				$("#loader").hide();

			},

			statusCode: {

				200: function(data) {

					$("#notes").empty();

					$("#notes").html(data);

				},

				500: function(xhr){
					
					console.log(xhr.responsText);

				}

			}

		});

	};

	var deleteNote = function(noteId) {

		$.ajax({
			url: "note/delete",
			type: "POST",
			data: {note_id: noteId},
			dataType: "json",
			statusCode: {
				200: function(xhr) {

					_alert({
						error: false,
						icon: "fa-check",
						message: "Your note has been successfully deleted."
					});

					getNotes();

				},
				500: function(xhr){

					_alert({
						error: true,
						icon: "fa-warning",
						message: "Something went wrong, please try again."
					});

				}
			}
		});
	};

	getNotes();

});
