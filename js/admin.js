function initMenu() {
$('#menu ul').hide();
$('#menu ul').children('.current').parent().show();
//$('#menu ul:first').show();
$('#menu li a').click(
  function() {
    var checkElement = $(this).next();
    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      //return false;
      $('#menu ul:visible').slideUp('normal');
      }
    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      $('#menu ul:visible').slideUp('normal');
      checkElement.slideDown('normal');
      return false;
      }
    }
  );
}


$(document).ready(function() {
	initMenu();
	$(".navbar-stacked > li >").click(function(event) {
		/* Act on the event */
		var url = $(this).attr('href');
		if(url == "#"){
			event.preventDefault();
		}
	});	
});