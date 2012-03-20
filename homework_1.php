<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FMI_HomeWork-1.1</title>
</head>

<body>
		<?php
			function IsPrime($Num)
			{
			if((($Num%2)==0 AND $Num>2) || $Num<2) return false;
			for($Divisor = 3; $Divisor <=sqrt($Num); $Divisor++)
			{
					if(($Num%$Divisor)==0)
					{
					return false;
					};
			};// close  FOR 
				return true;
			};// close  function
			?>
	
			<?php
			$n = $_GET['number'];
			echo "{$n} is selected. <br />";
			if (!is_numeric($n))
			{
				echo "The parameter is not a number!"; exit;
			};
			if (!($n>=0 && $n<=19999))
			{
				echo "The parameter is not within the range [0,19999]"; exit;
			};
			if(IsPrime($n))
			{
				echo "The number {$n} is prime!";
			}
			else
			{
				echo "<div style=\"color:blue\"> The number {$n} is NOT prime!</div>";
			};
			
		 ?>
</body>
</html>