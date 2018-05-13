$(document).ready( function() {

    $("#sidebar-search-suggestions").removeClass('collapse');

    var query = '';
	
    $("#sidebar-search").keyup( function(e) {
        
        query = $(this).val();

        var charTyped = String.fromCharCode(e.which);
        
        if (!/[a-z]/i.test(charTyped)) {
            return;
        }

        $("#sidebar-search-suggestions").empty();

        query = $(this).val();

        if (query.length > 1) {

            if (query.trim().length === 0) {
                
                $("#sidebar-search-suggestions").empty();
            
            } else {

                getSuggestions();

            }

        }

	});

    var buildList = function(data) {

        $.each(data, function(i) {

            var newText = String(data[i].forename + '  ' + data[i].surname).replace(new RegExp(query, "gi"), "<span class='ui-state-highlight'>$&</span>");
                    
            $("<li></li>").data("item.autocomplete", data[i].foreanme).append("<a href='/client" + data[i].client_id + "'>" + newText + "</a>").appendTo("#sidebar-search-suggestions");

        });

    };

    var getSuggestions = function() {

        $.ajax({
            type: 'GET',
            url: 'search/suggest/' + query,
            dataType: 'json',
            success: function(data) {
                buildList(data);   
            },
            error: function (response) {
                console.log(response);
            }

        });

    };

});