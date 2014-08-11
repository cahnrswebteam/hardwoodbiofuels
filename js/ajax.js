/* FUNCTIONS FOR AHB CUSTOM DEV HERE */

jQuery(function($){
	$(document).ready(function(){
	
	$("div#enews input#go-enews").click(function(){
		$("div#ajax-result").hide();
		var mail = "";
		mail = $(this).siblings("#val-enews").val();
		if(mail != ""){
				$.post("/wp-content/themes/hardwoodbiofuels/services/ajax.php", {addr: mail,formtype: "newsletter"}, function(data){ 
				if(data){
					$("div#ajax-result").html(data).slideDown(500);
					}
				}, 
				"html");
			}
		else{
			$str = '<p class="alert">Please enter a valid email address.</p>';
			$("div#ajax-result").html($str).slideDown(500);
			}
		});
		
		
	// SUBMITTING THE QUESTIONNAIRE
	$("form#ahb-survey input#submit").click(function(){
		var formVals = $(this).parents("#ahb-survey").serialize();
		$.post("/wp-content/themes/hardwoodbiofuels/services/ajax.php", formVals, function(data){ 
		if(data){
			var resAry = new Array();
			var vars = new Array();
			vars = data.split("::");
			for(var i=0;i<vars.length; i++){
				var rs = vars[i].split("|");
				resAry[rs[0]] = rs[1];
				}
			
			if(resAry["PROOF"] == "TRUE"){
				var keysAry = keys(resAry);
				for(var i=0; i<keysAry.length; i++){
					var val = resAry[keysAry[i]];
					val = val.replace("<br>","\r\n");
					$("form#ahb-survey #" + keysAry[i]).hide().after('<span class="proof">' + val + '</span>');
					}
				$("form#ahb-survey #submit").val("Finish").after('<input type="button" name="fix" id="fix" value="Change" />');
				$("form#ahb-survey #formtype").val("questionnaire_submit");
				}
			
			else if(resAry["FINISHED"] == "TRUE"){
				$("form#ahb-survey").hide();
				$("div#ajax-result").html(resAry["ALERT"]).slideDown(500).css("margin-top","500px");
				}
			
			else if(resAry["FINISHED"] == "ERROR"){
				$("div#ajax-result").html(resAry["ALERT"]).slideDown(500);
				}
			}
		}, 
		"html");

		});
		
		// THIS JUST SETS THE PAGE BACK TO NORMAL
		$("form#ahb-survey input#fix").live("click",function(){
			$("span.proof").remove();
			$("form#ahb-survey input#fix").remove();
			$("form#ahb-survey input,form#ahb-survey select").show();
			$("form#ahb-survey #submit").val("Submit Questionnaire")
			$("form#ahb-survey #formtype").val("questionnaire");
			});
			
		$("iframe.ytube").live("mouseover",function(){
			$(this).attr("width","560").attr("height","315").css({"position":"absolute","margin-left":"-340px"}).after("<span class='close'>[ CLOSE ]</span>");
			});
		$("span.close").live("click",function(){
			$("iframe.ytube").attr("width","220").attr("height","124").css({"position":"relative","margin-left":"0"});
			$("span.close").remove();
			});
			
		});
	});


function keys(obj){
    var keys = [];
    for(var key in obj){
        if(obj.hasOwnProperty(key)){keys.push(key);}
    	}
    return keys;
	}


	

