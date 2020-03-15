<?php
###Ini Copyright###
###https://github.com/osyduck/Gojek-Register###

include ("function.php");
echo "Choose Login or Register? Login = 1 & Register = 2: ";
$type = trim(fgets(STDIN));
if($type == 2){
echo "It's Register Way\n";
echo "Input 62 For ID and 1 For US Phone Number\n";
echo "Enter Number: ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
	{
	echo "Failed to Get OTP, Use Unregistered Number!\n";
	}
  else
	{
	echo "Enter Your OTP: ";
	// echo "Enter Number: ";
	$otp = trim(fgets(STDIN));
	$verif = verif($otp, $register);
	if ($verif == false)
		{
		echo "Failed to Registering Your Number!\n";
		}
	  else
		{
		echo "Ready to Claim\n";
		$claim = claim($verif);
		if ($claim == false)
			{
			echo "Failed to Claim Voucher, Try to Claim Manually\n";
			}
		  else
			{
			echo $claim . "\n";
			}
		}
	}
}else if($type == 1){
echo "It's Login Way\n";
echo "Input 62 For ID and 1 For US Phone Number\n";
echo "Enter Number: ";
$nope = trim(fgets(STDIN));
$login = login($nope);
if ($login == false)
	{
	echo "Failed to Get OTP!\n";
	}
  else
	{
	echo "Enter Your OTP: ";
	// echo "Enter Number: ";
	$otp = trim(fgets(STDIN));
	$verif = veriflogin($otp, $login);
	if ($verif == false)
		{
		echo "Failed to Login with Your Number!\n";
		}
	  else
		{
		echo "Ready to Claim\n";
		$claim = claim($verif);
		if ($claim == false)
			{
			echo "Failed to Claim Voucher, Try to Claim Manually\n";
			}
		  else
			{
			echo $claim . "\n";
			}
		}
	}
}
?>
