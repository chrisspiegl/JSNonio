// Check if a new cache is available on page load.
window.addEventListener('load', function(e) {
  window.applicationCache.addEventListener('updateready', function(e) {
    if (window.applicationCache.status == window.applicationCache.UPDATEREADY) {
      // Browser downloaded a new app cache.
      // Swap it in and reload the page to get the new hotness.
      window.applicationCache.swapCache();
      if (confirm('A new version of this site is available. Load it?')) {
        window.location.reload();
      }
    } else {
      // Manifest didn't changed. Nothing new to server.
    }
  }, false);

}, false);







// remap jQuery to $
(function($){})(window.jQuery);

var gridarray = new Array();
var prevClick = curClick = '';
var prevClickId = curClickId = -1;
var prevClickNr = curClickNr = 0;
var anz_buttons = -1;


/* trigger when page is ready */
$(document).ready(function (){
	printFirstGrid();
	
	$('#reprint').bind('click', function(e){
		e.preventDefault();
		reprintGrid();
	});
	
	$('a.hide').click(function(e){
		e.preventDefault();
		$('article').hide();
	})
	
	
	/*
	for(var i = 0; i<9; i++){
		printGridButton(1);
	}
	for(var i = 0; i<9; i++){
		printGridButton(2);
	}
	for(var i = 0; i<9; i++){
		printGridButton(2);
	}
	for(var i = 0; i<9; i++){
		printGridButton(1);
	}*/
});








function printFirstGrid(){
	for(var i = 1; i<20; i++){
		if(i !=  10){
			printGridButton(i);
		}
	}
	
}

function reprintGrid(){
	var curlength = gridarray.length;
	for(var i = 0; i < curlength; i++){
		if(gridarray[i] !== 0) {
			printGridButton(gridarray[i]);
			console.log(i);
		} else console.log("DO NOT PRINT AGAIN");
	}
}

function printGridButton(number){
	var grid = '';
	anz_buttons++;
	if(number/10 > 1){
		gridarray.push(Math.floor(number/10));
		grid += '<a href="javascript:void(0);" id="button-'+anz_buttons+'"><div>'+Math.floor(number/10)+'</div></a>';
		anz_buttons++;
		gridarray.push(number%10);
		grid += '<a href="javascript:void(0);" id="button-'+anz_buttons+'"><div>'+number%10+'</div></a>';
	}else {
		gridarray.push(number);
		grid += '<a href="javascript:void(0);" id="button-'+anz_buttons+'"><div>'+number+'</div></a>';
	}
	$('#grid').append(grid);
	
	$('#grid a').unbind('click');
	$('#grid a').bind('click', clickButton);
	//$('#grid a').bind('click', clickButton); // $.throttle(500, clickButton)
}












function clickButton(e){
	e.preventDefault();
	
	curClick = $(this);
	curClickId = parseInt(curClick.attr('id').split("-")[1]);
	curClickNr = parseInt($(this).text());
	
	console.log('curNr: ' + curClickNr + '\ncurId: ' + curClickId + '\nprevNr: ' + prevClickNr + '\nprevID: ' + prevClickId);
	
	if(!curClick.hasClass('active') && curClick.hasClass('done') === false){
		$(this).addClass('active');
		if(prevClick === '') {
			prevClick = curClick;
			prevClickId = curClickId;
			prevClickNr = curClickNr;
		} else {
			if(checkClick()){
				$(this).addClass('done');
				$(prevClick).addClass('done');
				gridarray[curClickId] = 0;
				gridarray[prevClickId] = 0;
			}
			prevClick = '';
			prevClickId = -1;
			prevClickNr = 0;
			$('#grid *').removeClass('active');
		}
	}else if(curClick.hasClass('active')){
		curClick.removeClass('active');
		prevClick = '';
		prevClickId = -1;
		prevClickNr = 0;
	}
}



function checkClick(){
	console.dir(gridarray);
	// curClickNr === prevClickNr
	if(checkClickEqual()) return true;
	// curClickNr + prevClickNr === 10
	if(checkClickSum()) return true;	
	return false;
}


function checkClickEqual(){
	if(curClickNr === prevClickNr) return checkNeighbors();
	return false;
}

function checkClickSum(){
	if(curClickNr + prevClickNr === 10) return checkNeighbors();
	return false;
}


function checkNeighbors(){
	if(checkNeighborsLR()) return true;
	if(checkNeighborsTD()) return true;
	return false;
}

function checkNeighborsLR(){
	if(prevClickId < curClickId){
		for(var i = prevClickId+1; i < curClickId; i++){
			if(gridarray[i] !== 0) return false;
		}
		return true;
	}else{
		for(var i = prevClickId-1; i > curClickId; i--){
			if(gridarray[i] !== 0) return false;
		}
		return true;
	}
}

function checkNeighborsTD(){
	console.log('same row ' + prevClickId/9 + ' / ' + curClickId/9 + ' / ' + ((prevClickId/9)-(curClickId/9)));
	if(prevClickId%9 === curClickId%9){ //  && (((prevClickId/9)-(curClickId/9)) <= 1 && ((prevClickId/9)-(curClickId/9)) >= -1)
		var curMod = curClickId%9;
		var prevMod = prevClickId%9;
		var curDiv = Math.floor(curClickId/9);
		var prevDiv = Math.floor(prevClickId/9);
		
		if(prevClickId < curClickId){
			for(var i = 1; i < curDiv-prevDiv; i++){
				//console.log(gridarray[(prevClickId+(9*i))] + ' / ' + (prevClickId+(9*i)));
				if(gridarray[(prevClickId+(9*i))] !== 0){
					return false;
				}
			}
			return true;
		}else{
			for(var i = 1; i < prevDiv-curDiv; i++){
				//console.log(gridarray[(prevClickId+(9*i))] + ' / ' + (prevClickId+(9*i)));
				if(gridarray[(curClickId+(9*i))] !== 0){
					return false;
				}
			}
			return true;
		}
		
		
		console.log(prevMod + ' / '+ curMod + ' / ' + prevDiv + ' / '+ curDiv);
		
	}
	return false;
}



/* optional triggers 

$(window).load(function() {
	
});

$(window).resize(function() {
	
});
*/