// Create a request variable and assign a new XMLHttpRequest object to it.
$(document).ready(function(){
  		//$('.btn-write-advice').hover().css('background','white');
  		$('.advice-div').css('display','none');
  		$('.btn-write-advice').click(function(){
  			// if($('.advice-div').style.display==="none")
  			// {
  			 	$('.advice-div').css('display','block');
  			// }
  			// else{
  			// 		$('.advice-div').css('display','none');
  			// 	}
  				
  		});
  	});
		function read(){
			var dot=document.getElementById('dots');
			var moreText=document.getElementById('more');
			var ReadMore=document.getElementById('readmore');
			if(dot.style.display==="none"){
				dot.style.display="inline";
				moreText.style.display="none";
				ReadMore.innerHTML="Read more";
			}
			else{
				dot.style.display="none";
				moreText.style.display="inline";
				ReadMore.innerHTML="Read less";
			}
		}
var request = new XMLHttpRequest();

// Open a new connection, using the GET request on the URL endpoint
request.open('GET', 'http://127.0.0.1:8000/api/mainPage', true);

request.onload = function () {
 	var data=JSON.parse(this.response);
 	//data.forEach(problem=>{
 		console.log("asdfghjk");
 	//});
 }
// Send request
//request.send();