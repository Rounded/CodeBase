$(document).ready(function(){

	//Medicare,medicaid, etc
	var planIndex = 0;
	$("#total-mem-id").addClass('num-field');
	$("#total-exp-id").addClass('num-field');
	$("#pt-exp-id").addClass('num-field');
	$("#dc-exp-id").addClass('num-field');
	$("#spine-exp-id").addClass('num-field');
	
	//No letters allowed
	$('.num-field').keyup(function(){
		var initVal = $(this).val();
        outputVal = initVal.replace(/[a-z]/g,"");       
        
        if (initVal != outputVal) {
            $(this).val(outputVal);
        }
	});
	
	//set original plan name
	$(".plan-title").html('medicare');
	
	//Change plan name & index on change
	$("#plan-type-id").change(function(){
		planIndex = $(this).attr('value');
		
		$(".plan-title").html($("#plan-type-id option[value='"+planIndex+"']").text());
		
		updateMem();
		
	});
	
	//Change expenditures on membership change
	$("#total-mem-id").keyup(function(){
		updateMem();
	});
	
	//Change expenditures on membership change
	$("#total-exp-id").keyup(function(){
		updateExp();
	});
	
	function updateMem(){
		var totalMem = $("#total-mem-id").val();
	
		if(planIndex == 0){
			var totalExp = totalMem * 10000;
			$("#total-exp-id").attr('value', formatCurrency(formatCurrency(totalExp)));
			
			var spineExp = totalExp * .05;
			$("#spine-exp-id").attr('value', formatCurrency(formatCurrency(spineExp)));
			
			var ptExp = totalExp * .01;
			$("#pt-exp-id").attr('value', formatCurrency(formatCurrency(ptExp)));
			
			var dcExp = totalExp * .005;
			$("#dc-exp-id").attr('value', formatCurrency(formatCurrency(dcExp)));
			
			var spineSav = spineExp * .25;
			$("#spine-sav-id").attr('value', formatCurrency(formatCurrency(spineSav)));
			
			var ptSav = ptExp * .30;
			$("#pt-sav-id").attr('value', formatCurrency(formatCurrency(ptSav)));
			
			var chiroSav = dcExp * .20;
			$("#chiro-sav-id").attr('value', formatCurrency(formatCurrency(chiroSav)));
			
			var totalSav = spineSav + ptSav + chiroSav;
			$("#total-sav-id").attr('value', formatCurrency(formatCurrency(totalSav)));

		}
		
		else if(planIndex == 1){
			var totalExp = totalMem * 10000;
			$("#total-exp-id").attr('value', formatCurrency(totalExp));
			
			var spineExp = totalExp * .05;
			$("#spine-exp-id").attr('value', formatCurrency(spineExp));
			
			var ptExp = totalExp * .01;
			$("#pt-exp-id").attr('value', formatCurrency(ptExp));
			
			var dcExp = totalExp * .005;
			$("#dc-exp-id").attr('value', formatCurrency(dcExp));
			
			var spineSav = spineExp * .25;
			$("#spine-sav-id").attr('value', formatCurrency(spineSav));
			
			var ptSav = ptExp * .22;
			$("#pt-sav-id").attr('value', formatCurrency(ptSav));
			
			var chiroSav = dcExp * .25;
			$("#chiro-sav-id").attr('value', formatCurrency(chiroSav));
			
			var totalSav = spineSav + ptSav + chiroSav;
			$("#total-sav-id").attr('value', formatCurrency(totalSav));
		
		}
		
		else if(planIndex == 2){
			var totalExp = totalMem * 3700;
			$("#total-exp-id").attr('value', formatCurrency(totalExp));
			
			var spineExp = totalExp * .05;
			$("#spine-exp-id").attr('value', formatCurrency(spineExp));
			
			var ptExp = totalExp * .01;
			$("#pt-exp-id").attr('value', formatCurrency(ptExp));
			
			var dcExp = totalExp * .005;
			$("#dc-exp-id").attr('value', formatCurrency(dcExp));
			
			var spineSav = spineExp * .25;
			$("#spine-sav-id").attr('value', formatCurrency(spineSav));
			
			var ptSav = ptExp * .22;
			$("#pt-sav-id").attr('value', formatCurrency(ptSav));
			
			var chiroSav = dcExp * .25;
			$("#chiro-sav-id").attr('value', formatCurrency(chiroSav));
			
			var totalSav = spineSav + ptSav + chiroSav;
			$("#total-sav-id").attr('value', formatCurrency(totalSav));
		}
		
		else if(planIndex == 3){
			var totalExp = totalMem * 5000;
			$("#total-exp-id").attr('value', formatCurrency(totalExp));
			
			var spineExp = totalExp * .05;
			$("#spine-exp-id").attr('value', formatCurrency(spineExp));
			
			var ptExp = totalExp * .01;
			$("#pt-exp-id").attr('value', formatCurrency(ptExp));
			
			var dcExp = totalExp * .005;
			$("#dc-exp-id").attr('value', formatCurrency(dcExp));
			
			var spineSav = spineExp * .25;
			$("#spine-sav-id").attr('value', formatCurrency(spineSav));
			
			var ptSav = ptExp * .22;
			$("#pt-sav-id").attr('value', formatCurrency(ptSav));
			
			var chiroSav = dcExp * .25;
			$("#chiro-sav-id").attr('value', formatCurrency(chiroSav));
			
			var totalSav = spineSav + ptSav + chiroSav;
			$("#total-sav-id").attr('value', formatCurrency(totalSav));
		}
	}
	
	function updateExp(){
		var totalExp = Number($("#total-exp-id").val().replace(/[^0-9\.]+/g,""));
	
		if(planIndex == 0){
			var spineExp = totalExp * .05;
			$("#spine-exp-id").attr('value', formatCurrency(spineExp));
			
			var ptExp = totalExp * .01;
			$("#pt-exp-id").attr('value', formatCurrency(ptExp));
			
			var dcExp = totalExp * .005;
			$("#dc-exp-id").attr('value', formatCurrency(dcExp));
			
			var spineSav = spineExp * .25;
			$("#spine-sav-id").attr('value', formatCurrency(spineSav));
			
			var ptSav = ptExp * .30;
			$("#pt-sav-id").attr('value', formatCurrency(ptSav));
			
			var chiroSav = dcExp * .20;
			$("#chiro-sav-id").attr('value', formatCurrency(chiroSav));
			
			var totalSav = spineSav + ptSav + chiroSav;
			$("#total-sav-id").attr('value', formatCurrency(totalSav));
			
			
	
		}
		
		else if(planIndex == 1){
			var spineExp = totalExp * .05;
			$("#spine-exp-id").attr('value', formatCurrency(spineExp));
			
			var ptExp = totalExp * .01;
			$("#pt-exp-id").attr('value', formatCurrency(ptExp));
			
			var dcExp = totalExp * .005;
			$("#dc-exp-id").attr('value', formatCurrency(dcExp));
			
			var spineSav = spineExp * .25;
			$("#spine-sav-id").attr('value', formatCurrency(spineSav));
			
			var ptSav = ptExp * .22;
			$("#pt-sav-id").attr('value', formatCurrency(ptSav));
			
			var chiroSav = dcExp * .25;
			$("#chiro-sav-id").attr('value', formatCurrency(chiroSav));
			
			var totalSav = spineSav + ptSav + chiroSav;
			$("#total-sav-id").attr('value', formatCurrency(totalSav));
		
		}
		
		else if(planIndex == 2){
	
			var spineExp = totalExp * .05;
			$("#spine-exp-id").attr('value', formatCurrency(spineExp));
			
			var ptExp = totalExp * .01;
			$("#pt-exp-id").attr('value', formatCurrency(ptExp));
			
			var dcExp = totalExp * .005;
			$("#dc-exp-id").attr('value', formatCurrency(dcExp));
			
			var spineSav = spineExp * .25;
			$("#spine-sav-id").attr('value', formatCurrency(spineSav));
			
			var ptSav = ptExp * .22;
			$("#pt-sav-id").attr('value', formatCurrency(ptSav));
			
			var chiroSav = dcExp * .25;
			$("#chiro-sav-id").attr('value', formatCurrency(chiroSav));
			
			var totalSav = spineSav + ptSav + chiroSav;
			$("#total-sav-id").attr('value', formatCurrency(totalSav));
		}
		
		else if(planIndex == 3){
	
			var spineExp = totalExp * .05;
			$("#spine-exp-id").attr('value', formatCurrency(spineExp));
			
			var ptExp = totalExp * .01;
			$("#pt-exp-id").attr('value', formatCurrency(ptExp));
			
			var dcExp = totalExp * .005;
			$("#dc-exp-id").attr('value', formatCurrency(dcExp));
			
			var spineSav = spineExp * .25;
			$("#spine-sav-id").attr('value', formatCurrency(spineSav));
			
			var ptSav = ptExp * .22;
			$("#pt-sav-id").attr('value', formatCurrency(ptSav));
			
			var chiroSav = dcExp * .25;
			$("#chiro-sav-id").attr('value', formatCurrency(chiroSav));
			
			var totalSav = spineSav + ptSav + chiroSav;
			$("#total-sav-id").attr('value', formatCurrency(totalSav));
		}
		
	
	}
	
});

function formatCurrency(num) {
	num = num.toString().replace(/\$|\,/g,'');
	if(isNaN(num))
	num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num*100+0.50000000001);
	cents = num%100;
	num = Math.floor(num/100).toString();
	if(cents<10)
	cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
	num = num.substring(0,num.length-(4*i+3))+','+
	num.substring(num.length-(4*i+3));
	return (((sign)?'':'-') + '$' + num + '.' + cents);
}



 
