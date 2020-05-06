<html>
<head>
<title>SkillRary-HTML/CSS/JS Editor</title>
<meta name="Description" content="SkillRary's Free HTML, CSS, Js online editor" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 

<link rel="stylesheet" href="<?=base_url().'editor/skillrary-editor.css';?>">
<script src="<?=base_url().'editor/skillrary-editor.js';?>"></script>
<script src="<?=base_url().'editor/matchbrackets.js';?>"></script>
<script src="<?=base_url().'editor/javascript.js';?>"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
 <style type="text/css">
 
 	.gutter.gutter-vertical {
	    cursor: ns-resize;
	}

	.gutter {
	    background: #2c2f34;
	    position: relative;
	}

	.gutter.gutter-vertical:after {
    content: "";
    display: block;
    height: 8px;
    width: 100%;
    position: absolute;
    top: -3px;
    z-index: 10;
}
 .gutter.gutter-horizontal {
    cursor: ew-resize;
    height: 100%;
    float: left;
}
.gutter.gutter-horizontal:after {
    content: "";
    display: block;
    height: 100%;
    width: 8px;
    /*position: absolute;*/
    left: -3px;
    z-index: 10;
}

.topnav-right {
  	float: right;
    display: flex;
    margin-top: -5px;
}
.item{
	/*display: flex;*/
    outline: none;
    text-decoration: none;
    padding: 20px 12px;
   /* align-items: center;
    justify-content: center;*/
    color: white !important;
    /*position: relative;*/
    height: 60px;
}
.item:hover{
	color: white;
    text-decoration: none;
    border-bottom: 3px solid white;
    padding: 20px 12px;
}
.itemLight{
	position: relative;
	margin-top: 19px;
}

body {
    background: none repeat scroll 0 0 #1f2227;
    /*overflow: hidden;*/
    position: relative;
    color: white !important;
    /*margin: 10px 0px !important;*/

    /*margin: 0px;*/
    /*padding: 10px;*/
}
/*div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, fieldset, input, textarea, p, blockquote, th, td {
    margin: 0;
    padding: 0;
}*/
iframe{
    border: initial;
    height: 45%;
    width: 100%;
    background: white;
    overflow-y: auto;
}
fieldset {
    border: 0 none;
}
#LeftPanel {
    width: 50%;
    float: left;
}
#RightPanel {
    width: 50%;
    float: right;
}
.handler_vertical {
    cursor: col-resize;
    width: 8px;
    float: left;
}
.handler_horizontal {
    cursor: row-resize;
    height: 8px;
    width: 100%;
    float: left;
}
.window {
    /*border: 1px solid #ADADAD;*/
    width: 100%;
    float: left;
}
.top {
    height: 50%;
}
.bottom {
    height: 75%;
}
 
  .CodeMirror {
    font-family: monospace;
    height: 396px;
    color: white;
    direction: ltr;
    background: initial;
}

.frame-main{color:  white !important;}
.CodeMirror div.CodeMirror-cursor {
  border-left: 1px solid white;
}
.resultBG{
   background: white;
    color: black;
    height: 5.3vh;

}


   
 </style>
</head>
<body>
	<div class="container-fluid" style="background: #33A478;">
		<img src="https://skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary" style="padding:5px">
		  <!-- <nav class="topnav-right">
		  	<div class="itemLight">
		  		    <a href="#search" class="item"><span><i class="fa fa-play" aria-hidden="true"></i></span>&nbsp;Run</a>
		  	</div>
		     	<div class="itemLight">
		  		    <a href="#search" class="item"><span><i class="fa fa-cloud-download" aria-hidden="true"></i></span>&nbsp;Save</a>
		  	</div>
		  </nav> -->
	</div>
	<div class="container-fluid">
	<div class="row">
	 	<div id="content" style="display: flex;width: 100%">
		    <fieldset id="LeftPanel" style="width: 50%;">
		        <div id="div_HTML" class="window top" style="color: white">HTML
                    <textarea class="code" name="code" id="codert" cols="40" rows="5" placeholder="Enter code here ..." style="width: 810px; height: 200px"></textarea>
                </div>
		        <div id="div_left" class="handler_horizontal gutter gutter-vertical"  style="height: 1px;"></div>
		        <div id="div_JS" class="window bottom" style="color: white">JS
                    <textarea id="codeJS" class="code" name="codeJS"  cols="40" rows="5" placeholder="Enter code here ..." style="width: 810px; height: 200px"></textarea>
                </div>
		    </fieldset>
		    <div id="div_vertical" class="handler_vertical gutter gutter-horizontal" style="width: 1px;"></div>
		    <fieldset id="RightPanel" style="width: 50%;">
		        <div id="div_CSS" class="window top" style="color: white">CSS

            <textarea id="code" class="code" name="codeCSS"  cols="40" rows="5" placeholder="Enter code here ..." style="width: 810px; height: 200px"></textarea>

            </div>
		    <div id="div_right" class="handler_horizontal gutter gutter-vertical"  style="height: 1px;"></div>     
            <div id="result" class="window resultBG">Result</div>                                      
            <iframe id="preview"></iframe>
		    </fieldset>
		</div>
	</div>
	</div>
	<script type="text/javascript">



    //meena

    function loadCSS() {
    var $head = $("#preview").contents().find("head");                
    $head.html("<style>" + editor.getValue() + "</style>");
}; 

function loadJS() {
    var scriptTag = "<script>"+editorJS.getValue()+"<";
    scriptTag +=  "/script>";
    
    var previewFrame2 = document.getElementById('preview');
    var preview2 =  previewFrame2.contentDocument ||  previewFrame2.contentWindow.document;
    preview2.open();
    preview2.write(editor2.getValue()+scriptTag);
    preview2.close();
    
    loadCSS();
};

var delay;
// Initialize CodeMirror editor with a nice html5 canvas demo.
var editor = CodeMirror.fromTextArea(document.getElementById('code'), {
    lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true,
    mode: 'text/html'
});
editor.on("change", function() {
    clearTimeout(delay);
    
    delay = setTimeout(updatePreview, 300);
});

function updatePreview() {
    loadCSS();
}
setTimeout(updatePreview, 300);


var delay2;
// Initialize CodeMirror editor with a nice html5 canvas demo.
var editor2 = CodeMirror.fromTextArea(document.getElementById('codert'), {
    lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true,
    mode: 'text/html'
});
editor2.on("change", function() {
    clearTimeout(delay2);
    
    delay2 = setTimeout(updatePreview2, 300);
});

function updatePreview2() {
    var scriptTag = "<script>"+editorJS.getValue()+"<";
    scriptTag +=  "/script>";
    
    var previewFrame2 = document.getElementById('preview');
    var preview2 =  previewFrame2.contentDocument ||  previewFrame2.contentWindow.document;
    preview2.open();
    preview2.write(editor2.getValue()+scriptTag);
    preview2.close();

    loadCSS();
}
setTimeout(updatePreview2, 300);


var delayJS;
// Initialize CodeMirror editor with a nice html5 canvas demo.
var editorJS = CodeMirror.fromTextArea(document.getElementById('codeJS'), {
    lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true,
    mode: 'javascript'
});
editorJS.on("change", function() {
    clearTimeout(delayJS);
    
    delayJS = setTimeout(updatePreviewJS, 300);
});

function updatePreviewJS() {
    loadJS();
}
setTimeout(updatePreviewJS, 300);


    // 		$(function () {
    //     window.onresize = resize;
    //     resize();
    // });

    // function resize() {
    //     var h = (window.innerHeight || (window.document.documentElement.clientHeight || window.document.body.clientHeight));
    //     var divHight = 20 + $("#div_left").height(); //20=body padding:10px
    //     $("#content").css({
    //         "min-height": h - divHight + "px"
    //     });
    //     $("#div_vertical").css({
    //         "height": h - divHight + "px"
    //     });
    //     $("#LeftPanel").css({
    //         "height": h - divHight + "px"
    //     });
    //     $("#RightPanel").css({
    //         "height": h - divHight + "px",
    //             "width": $("#content").width() - $("#LeftPanel").width() - $("#div_vertical").width() + "px"
    //     });
    // }

    // jQuery.resizable = function (resizerID, vOrH) {
    //     jQuery('#' + resizerID).bind("mousedown", function (e) {
    //         var start = e.pageY;
    //         if (vOrH == 'v') start = e.pageX;
    //         jQuery('body').bind("mouseup", function () {
    //             jQuery('body').unbind("mousemove");
    //             jQuery('body').unbind("mouseup");

    //         });
    //         jQuery('body').bind("mousemove", function (e) {
    //             var end = e.pageY;
    //             if (vOrH == 'v') end = e.pageX;
    //             if (vOrH == 'h') {
    //                 jQuery('#' + resizerID).prev().height(jQuery('#' + resizerID).prev().height() + (end - start));
    //                 jQuery('#' + resizerID).next().height(jQuery('#' + resizerID).next().height() - (end - start));
    //             } else {
    //                 jQuery('#' + resizerID).prev().width(jQuery('#' + resizerID).prev().width() + (end - start));
    //                 jQuery('#' + resizerID).next().width(jQuery('#' + resizerID).next().width() - (end - start));
    //             }
    //             start = end;
    //         });
    //     });
    // }

    // jQuery.resizable('div_vertical', "v");
    // jQuery.resizable('div_right', "h");
    // jQuery.resizable('div_left', "h");
	</script>
</body>
</html>