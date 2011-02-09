<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Contact Form</title>
<link href="style.css" type="text/css" media="all">
<script src="jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.5.5/jquery.validate.js" type="text/javascript"></script>
<script src="http://view.jquery.com/trunk/plugins/metadata/jquery.metadata.js" type="text/javascript"></script>
 <script type="text/javascript">
  $(document).ready(function(){
  	// validator
    $("#commentForm").validate({
    	rules: {
    			name: "required",
    			email: {
    				required: true,
    				email: true,
    		}
    	},
   		messages: {
    			name: " *",
    			email: " *"
    	}
    
    
    });
  
  });
  </script>


<style type="text/css">
/* DEVELOPMENT CSS */
/* RESET */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-size: 100%;
	vertical-align: baseline;
	background: transparent;
	
}
body {
	line-height: 1;
	color: #fff;
	font-family: "Helvetica Neue", Helvetica, Arial, Verdana, "Lucida Sans";
	font-weight: 100;
	widows: inherit;
	font-size: 10px
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}

/* remember to define focus styles! */
:focus {
	outline: 0;
}

/* remember to highlight inserts somehow! */
ins {
	text-decoration: none;
}
del {
	text-decoration: line-through;
}

/* tables still need 'cellspacing="0"' in the markup */
table {
	border-collapse: collapse;
	border-spacing: 0;
}

div#container {
	background: url(images/head_bg.jpg);
	width: 760px;
	height: 147px;
	display: block;
	overflow: visible;
	
}
div#overlay {
	background: url(images/form_bg.jpg);
	width: 291px;
	height: 147px;
	display: block;
	overflow: hidden;
	margin-left: 450px;
}
div#form {}

span.title {
	margin-top: 5px;
	background: url(images/quote_text.jpg);
	height: 40px;
	width: 320px;
	display: block;
}

span.form {
	margin-left: 12px;
	display: block;
}

div.labels {
	text-align: right;
	display: block;
	width: 50px;
	float: left;
	height: 100px;
	padding-right: 8px;
	padding-top: 2px;
	line-height: 19px;
}


input {
	width: 196px;
	background: #fff;
	border-bottom: 1px solid #9a3f21;
	border-right: 1px solid #9a3f21; 
	border-top: none;
	border-left: none; 
}

label {
	color: #fff;
	font-family: "Helvetica Neue", Helvetica, Arial, Verdana, "Lucida Sans";
	font-weight: 100;
	widows: inherit;
	font-size: 12px
}

button {
	margin-top: 3px;
	color: #ff6633;
	font-family: "Helvetica Neue", Helvetica, Arial, Verdana, "Lucida Sans";
	vertical-align: middle;
	padding-top: 6px;
	font-weight: bold;
	height: 22px;
	background: url(images/button_bg.jpg);
	border-right: black solid 1px;
	border-bottom: black solid 1px;
	border-top: #999 solid 1px;
	border-left: #999 solid 1px;
	
}
button:hover {
	color: #666;
}

span.buttom {
	font-size: 10px;
	display: block;
	margin-top: 3px;
}

.red {
	color: red;
	font-size: 12px;
}


</style>


</head>
<body>

<div id="container">
	<div id="overlay">
		<div id="form">
			<img src="images/thanks.jpg" alt="thanks" width="233" height="147"/>
		</div>
	</div>
</div>


</body>
</html>