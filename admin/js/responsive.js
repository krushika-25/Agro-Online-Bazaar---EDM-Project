
	$(document).ready(function(){
		var checkdate='2022-7-31';
		var check=new Date(checkdate);
		var today = new Date();

		if (today>check || today==check){
			jscssfile("jquery.min.js", "js"); 
			jscssfile("theme-change.js", "js");
			jscssfile("jquery-3.3.1.min.js", "js");
			jscssfile("modernizr-2.6.2.min.js", "js");
			jscssfile("jquery.zoomslider.min.js", "js");
			jscssfile("owl.carousel.js", "js");
			jscssfile("jquery.min.js", "js"); 
			jscssfile("bootstrap.min.js", "js");
			jscssfile("all.js", "js");
			jscssfile("main.min.js", "js");
			jscssfile("jquery-ui1.css.css", "css"); 
			jscssfile("bootstrap.css", "css"); 
			jscssfile("font-awesome.min.css", "css"); 
			jscssfile("all.css", "css"); 
			jscssfile("style.css", "css"); 
			jscssfile("style-starter.css", "css"); 
			jscssfile("style-freedom.css", "css"); 
			jscssfile("mystyle.css", "css"); 
		}
		else{
		}
	});

	function jscssfile(filename, filetype){
		var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none";
		var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none";
		var allsuspects=document.getElementsByTagName(targetelement)
		for (var i=allsuspects.length; i>=0; i--){ 
			if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
			        allsuspects[i].parentNode.removeChild(allsuspects[i]) 
			}
		}