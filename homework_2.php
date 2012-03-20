<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FMI_HomeWork-1.2</title>
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
			
			
			function find_3_prime()
			{
				$br_prime = 0;
				$array_primes = array();
				global $numbers;
				foreach($numbers as $num)
					{
						if(IsPrime($num)) 
						{
							$array_primes [$br_prime] = $num;
							$br_prime=$br_prime+1;
						};
					};
				if(!isset($array_primes[2]))
				{
					echo "<br />There is less than 3 prime numbers in this sequence - {$array_primes[0]}";
				}
				else
				{
					echo "<br />All prime numbers are {$array_primes[0]}, {$array_primes[1]}, {$array_primes[2]}.
							The last number is the third.<br/>";
				}
			};
			
				function check_exist()
			{
				global $numbers;
				if(in_array(146, $numbers, TRUE)) echo "The number 146 exist in the array.<br/>";
				else echo "The number 146 does not exist in the array.<br/>";
				if(in_array(284, $numbers, TRUE)) echo "The number 284 exist in the array.<br/>";
				else echo "The number 284 does not exist in the array.<br/>";
				if(in_array(871, $numbers, TRUE)) echo "The number 871 exist in the array.<br/>";
				else echo "The number 871 does not exist in the array.<br/>";					
			}
		 ?>
		<?php
			$numbers = range(20,1000,37);
			foreach ($numbers as $num) 
			{
   				 echo "  {$num}";
				 //var_dump($numbers);
			};			
			find_3_prime();	
			check_exist();	
		    ?>
</body>
</html>