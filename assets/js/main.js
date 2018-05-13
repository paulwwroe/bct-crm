const page_wrapper = document.getElementById('page-wrapper')

page_wrapper.style.minHeight = '100%'

const icons = document.getElementsByClassName('fa')

for (let i=0; i<icons.length; i++) {

	icons[i].setAttribute('aria-hidden', true)

}

const headings = document.getElementsByTagName('h1')

if ( headings.length > 0 ) {

	headings[0].setAttribute('id', 'main-heading')

}

$(".collapse").on("shown.bs.collapse",function(event){

	$("#"+$(this).attr("data-focus")).focus();

});

$('.btn-collapse').click( function(e) {
    $('.collapse').collapse('hide');
});

/*
 *	Update <select> elements to show the selected value
 *	when populating <options> from database. A data-selected
 *	attribute is attached to the <select>
 */
 $("select[data-selected]").each(function(){

 	var _this = $(this);

 	var selectedValue = _this.attr("data-selected");

 	_this.find("option").each(function(){

 		if ($(this).val() === selectedValue) {

 			$(this).attr("selected", true);

 		}	

 	});

 });

