<?php

session_start();

include("includes/db.php");

<<<<<<< HEAD
include("functions/functions.php");
=======
// include("functions/functions.php");
>>>>>>> 52fad35c0d899a0c82b6c11e258c7f8427804b79
// include("includes/main.php");

?>


<?php

if(!isset($_SESSION['customer_email'])){
<<<<<<< HEAD
    
include("customer/customer_login.php");
=======

include("customer_login.php");
>>>>>>> 04f60ba9908614988aa6bf3f510473420e3b3cfb


}else{
include("payment_options.php");

}



?>




<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
