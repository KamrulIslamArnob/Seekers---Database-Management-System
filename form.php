<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <input type="text" name="fname">
        <br>
        <input type="text" name="fage">
        <br>
        <input type="submit" value="Submit" name="fsubmit">

        
    </form>
   
    <?php
    
    if(isset($_POST['fsubmit'])){
        
       
         echo $_POST['fname'];
         echo $_POST['fage'];
      
        
       
    }
    
    
    ?>
</body>
</html>