<?php 

$url = $_SESSION['joinUrl'];
?>


<!DOCTYPE html> 
<html> 
  
<head> 
    <title>SkillRary Meeting</title> 
    <style type="text/css"> 
        html { 
            overflow: auto; 
        } 
          
        html, 
        body, 
        div, 
        iframe { 
            margin: 0px; 
            padding: 0px; 
            height: 100%; 
            border: none; 
        } 
          
        iframe { 
            display: block; 
            width: 100%; 
            border: none; 
            overflow-y: auto; 
            overflow-x: hidden; 
        } 
    </style> 
</head> 
  
<body> 
    <iframe src="<?php echo $url; ?>"
            frameborder="0" 
            marginheight="0" 
            marginwidth="0" 
            width="100%" 
            height="100%" 
            scrolling="auto"> 
  </iframe> 
  
</body> 
  
</html> 