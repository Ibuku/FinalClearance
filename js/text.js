//text editing
$(document).ready(function(){
	var editor = $(".editor");
	var newText;
	$("#btn-b").click(function(){ //bold text
		var oldText = editor.val();
		newText = "[b][/b]";
		editor.val(oldText+newText);
		editor.focus();
	});

	$("#btn-i").click(function(){
		var oldText = editor.val();
		newText = "[i][/i]";
		editor.val(oldText+newText);
		editor.focus();
	});

	$("#btn-u").click(function(){
		var oldText = editor.val();
		newText = "[u][/u]";
		editor.val(oldText+newText);
		editor.focus();
	});

	$("#btn-s").click(function(){
		var oldText = editor.val();
		newText = "[s][/s]";
		editor.val(oldText+newText);
		editor.focus();
	});
	
	$("#btn-align-left").click(function(){
		var oldText = editor.val();
		newText = "[left][/left]";
		editor.val(oldText+newText);
		editor.focus();
	});

	$("#btn-align-right").click(function(){
		var oldText = editor.val();
		newText = "[right][/right]";
		editor.val(oldText+newText);
		editor.focus();
	});

	$("#btn-align-center").click(function(){
		var oldText = editor.val();
		newText = "[center][/center]";
		editor.val(oldText+newText);
		editor.focus();
	});

	$("#btn-align-justify").click(function(){
		var oldText = editor.val();
		newText = "[justify][/justify]";
		editor.val(oldText+newText);
		editor.focus();
	});

	$("#btn-link").click(function(){
		$("#show-modal").click();
	});

	$("#insert-link").click(function(){
		var link_text = $("#link_text").val();
		var link_url = $("#link_url").val();
		if(link_url==""){
			$("#c_link_url").removeClass("hide");
		}else{
			$("#c_link_url").addClass("hide");
		}

		if(link_text==""){
			$("#c_link_text").removeClass("hide");
		}else{
			$("#c_link_text").addClass("hide");
		}

		if(link_text=="" || link_url==""){
			return false;
		}else{
			$("#link_url,#link_text").val('');
			$("#close-modal").click();
			var oldText = editor.val();
			newText = "[url href="+link_url+"]"+link_text+"[/url]";
			editor.val(oldText+newText);
			editor.focus();
		}
	});

});