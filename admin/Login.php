<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style>
			sup {
				color : red;
			}
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		function validateEmail(emailField){
        		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        		if (reg.test(emailField.value) == false) 
        		{
            		alert('Invalid Email Address');
            		return false;
        		}

        		return true;

		}
	</script>
</head>
<body>
	<div class="header">
		<h2>Log In !</h2>
	</div>
	
	<form name="person1" method="post" action="log.php" onsubmit="return validateForm();">

		<div class="input-group">
			<label>Email ID<sup>*</sup></label>
			<input type="text" name="email" placeholder="Like adi@gmail.com" onblur="return validateEmail(this)" required/>
		</div>
		<div class="input-group">
			<label>Password<sup>*</sup></label>
			<label><input type="password" name="pass" placeholder = "**************" required/></label>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
		</div>
		<p>
			Forgot password ? <a href="forgot.php">click here</a>
		</p>
	</form>
</body>
</html>
