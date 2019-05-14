var gif1 = ["images/gif1.gif", "images/gif2.gif", "images/gif3.gif"]
var integer = 0;


function show_image() {
    var img = document.createElement("img");
    img.src = gif1[integer]
    img.id = "gif"
    alt = ""
    img.style = "width:12.5em;height:13.12em;" 
   
    // This next line will just add it to the <body> tag
    
	document.getElementById('login').appendChild(img);


    //This adds something that listens for clicks
    document.getElementById('gif').addEventListener('click', function(e) {
        if (integer == 2) {
            integer = 0;
        } else {
            integer = integer + 1;
        }
        //This sets the source again
        document.getElementById('gif').src = gif1[integer]
    });
}

show_image()