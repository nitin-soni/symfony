(function($){
	
function left_menu(){
	var leftMenu = $("#left-menu").hide();
	var pageBodyHeight = $("#page-body").innerHeight() -70 + 'px';
	leftMenu.show();
	leftMenu.css('height', pageBodyHeight);
	leftMenu.css('margin-bottom', '-23px');
};


left_menu();



$( window ).resize(function() {
	left_menu();
});

})(jQuery);

function confirm_delete(message){
    message = typeof message !='undefined' ? message : 'Are you really want to delete ?';
    return confirm(message);
}