<?php


$userId = $_SESSION['id'];
$id = 2;
$codeId = $_SESSION['codeTestId'];
$mcqId = $_SESSION['mcqId'];

$url = "https://code.skillrary.com/url_assessment/".$userId."/".$id."/".$codeId."/".$mcqId."/aaa/bb";

?>
<!DOCTYPE html>
<html>
<body>
<style>
	html 
{
 overflow: auto;
}
 
html, body, div, iframe 
{
 margin: 0px; 
 padding: 0px; 
 height: 100%; 
 border: none;
}
iframe 
{
 display: block; 
 width: 100%; 
 border: none; 
 overflow-y: auto; 
 overflow-x: hidden;
}
</style>
<!-- <h1>The iframe element</h1> -->

<iframe id = "test" src="<?php echo  $url; ?>" frameborder="0" 
    marginheight="0" 
    marginwidth="0" 
    width="100%" 
    height="100%" 
    scrolling="auto">
  <p>Your browser does not support iframes.</p>
</iframe>
<script>
	 $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

//alert(window.innerHeight);
//document.getElementById("test").src = "https://www.w3schools.com";

// console.log('src', document.getElementById("test").src)
// document.getElementById("test").style.height = window.innerHeight+"px";
// document.getElementById("test").style.width = window.innerWidth+"px";
</script>
</body>
</html>
