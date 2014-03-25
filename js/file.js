// The functions to dynamically generate the divs in the patterns tab 

function replaceDiv(str){
	str = str.replace(/\<button\>(((?!\<\/button\>).)*)\<\/button\>/g, function(a,b){
        return $("body").data(b.trim());
    });
    return str;
}



var file = "./result.txt";
function getFile(){

    $.get(file,function(txt){
        var lines = txt.split("\n");
        var i;
        var div_name;
        var div;
        var inner_div;
        var str;
        for (i = 0, len = lines.length; i < len; i++) {

        	//skip the candidate if it is invalid
        	if (!isValidPattern(lines[i])){
        		i = i+2; //plus the support and \n
        		continue;
        	}
        	//create a new div for each candidate
        	else if (i%3 == 0){
        		//create outer div inside result
        		var result = document.getElementById('result');
				div_name = generateDiv();
            	div = document.getElementById(div_name);

				//create inner div inside outer div
				inner_div = document.createElement("div");
				inner_div.setAttribute("id", div_name+"_regex");
				div.appendChild (inner_div);

				str = replaceElement(lines[i]);
        		inner_div.innerHTML = str;

        	}

        	//second or third line of the candidate
        	else{
        		str = replaceElement(lines[i]);
        		div.innerHTML += "<br>"+ str+"<br>";
        	}
        	
            
        }
    }); 
}
//sometimes there will be a pattern in the tokenized tag itself
// (ie) <<DAYTOKEN>> and <<DATETIME>> will yield frequent pattern of <<DA*
//a valid pattern has equal rights and lefts, as well as an even number of total brackets
function isValidPattern(str){
	var leftRes = str.match(/\<{2}/g);
	var rightRes = str.match(/\>{2}/g);

	//check if both have 0 brackets
	if (leftRes == null && rightRes == null){
		return true;
	}

	//if only one side has 0 brackets, it is invalid
	else if (leftRes == null || rightRes == null){
		return false;
	}

	var leftTokens = leftRes.length;
	var rightTokens = rightRes.length;

	var isEven = ((leftTokens+rightTokens) % 2 == 0);
	var isEqualBracket = (leftTokens == rightTokens) ;

	return isEven && isEqualBracket;

}

//replaces token elements in a string, and puts the regex into a hash in the 'body' element
function replaceElement(str){
	str = str.replace(/\<\<([^>]*)\:([^>]*)\>\>/g, function(a,b,c){
        $( "body" ).data( b, c );
        return "<button>"+b+"</button>"; 
    });
    return str;
}

var div_id = 0;

function generateDiv (){
	var result = document.getElementById('result');
	var ele = document.createElement("div");
	ele.setAttribute("class", "clickable");
	var div_name = "candidate_"+div_id;
	ele.setAttribute("id", div_name);
	result.appendChild(ele);
	div_id++;
	return div_name;
	

}

// return a parameter value from the current URL
function getParam ( sname ){
    var params = location.search.substr(location.search.indexOf("?")+1);
    var sval = "";
    params = params.split("&");
    // split param and value into individual pieces
    for (var i=0; i<params.length; i++){
        temp = params[i].split("=");
        if ( [temp[0]] == sname ) { sval = temp[1]; }
    } 
    return sval;
}