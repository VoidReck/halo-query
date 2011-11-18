<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Cyber's Server Query by VividPerfection.com</title>
	<style type="text/css">
		@import url('css/layout.css');
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link rel="shortcut icon" href="icon.ico" type="image/x-icon" />

</head>
<body>

<div id="wrapper">
	<div id="head">
		<a href="http://query.vividperfection.com/"><img src="images/3.png" alt="" /></a>
	</div>
	<div id="body">
		<div class="top">
		</div>
		<div class="mid">
			<h1>Server Query</h1>
				<form name="form1" method="get" action="index.php">
					<?php
						if( isset($_GET["ip"]) && isset($_GET["port"]) )
						{
							if(($_GET["ip"] != 0) && ($_GET["port"] != 0))
							{

								$x = $_GET["ip"];
								$y = $_GET["port"];
								if( (errorcheck($x, $y)) )
									dispdata($x,$y);
								else
									echo "Please enter a valid IP address and port.<br><br>";			
							}
							else
								echo "Please enter an IP address and port.<br><br>";
						}
					?>
						<p class="first">IP Address: <input name="ip" size="18" type="text"></p>
						<p class="first">Port Number: <input name="port" value="2302" size="7" type="text"></p>
						<p class="first"><input value="Query Server" type="submit"></p>
				</form>
		</div>
		<div class="bot">
		</div>
		
		<div class="top">
		</div>
		<div class="mid">
			<h1>Contact Cyber</h1>
			<p>Email address is <a href="mailto:theguy@thatguycharlie.com">theguy@thatguycharlie.com</a></p>
			<p>Website is <a href="http://vividperfection.com/">vividperfection.com</a></p>
			<p>Halo CE user name is | Cyber |</p>
			<p>XFire is <a href="xfire:add_friend?user=supernaturalelf">supernaturalelf</a></p>
		</div>
		<div class="bot">
		</div>

		<div class="top">
		</div>
		<div class="mid">
			<p class="centered">Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | Valid <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a></p>
		</div>
		<div class="bot">
		</div>


	</div>
</div>
</body>
</html>

<?php

// functions

// error check ip and port for valid data
function errorcheck($x, $y)
{
	$xx = explode(".",$x);
	$good = 1;
	for($za=0;$za<4;$za++)
	{
		if( isset( $xx[$za] ) )
		{
				if( ($xx[$za] >= 0) && ($xx[$za] <= 255) )
					$good = 1;
				else
					return 0;
		}
		else
			return 0;
	}
	
	if( isset( $xx[4] ) )
		return 0;
		
	if( isset( $y ) )
	{	
		if( $y >= 0 )
			$good = 1;
		else
			return 0;
	}
	else
		return 0;

	return $good;	
}

// function to display data returned from query function
function dispdata($x, $y)
{
	class player
	{
		var $name;
  		var $score;
		var $ping;
		var $team;
	}
			
	class teamscore
	{
		var $red;
		var $blue;
	}
	
	$playerdat[16] = new player;
	$teamscor = new teamscore;
	
	$j = retrieve($x, $y, &$playerdat, &$teamscor);

	if($j == 1)
		echo "There was no Halo server detected at $x on port $y. <br><br>"; // server not found
	else if($j == 2)
		echo "There was an error opening the socket. Please enter a valid IP address and port. If the problem persists, contact the Admin.<br><br>";
		// error opening socket
	else
	{
		include 'data_table.php';
		// server found ok, include file [data_table.php] to display server data
	}

}



// query function originally written by zeeg
// modified by nontent
function retrieve($ip, $port, &$playerdat, &$teamscor)
{
		$fp = fsockopen("udp://$ip", $port, $errno, $errstr);
		$ticks = time();
		if (!$fp)
		{
			return 2; // socket could not be opened
		} 
		else
		{
			stream_set_timeout($fp, 2);
			fwrite($fp, "þý".Chr(0)."wjÿÿÿÿ");
	
			$x = explode(chr(0), fgets($fp));
			if ( isset($x[2]) ) { // isset prevents errors if x not set
				$ping = time() - $ticks;
				$array = array (
					"hostname"	=>	$x[2],
					"gamever"	=>	$x[4],
					"hostport"	=>	$x[6],
					"maxplayers"	=>	$x[8],
					"password"	=>	$x[10],
					"mapname"	=>	$x[12],
					"dedicated"	=>	$x[14],
					"gamemode"	=>	$x[16],
					"game_classic"	=>	$x[18],
					"numplayers"	=>	$x[20],
					"gametype"	=>	$x[22],
					"teamplay"	=>	$x[24],
					"gamevariant"	=>	$x[26],
					"fraglimit"	=>	$x[28]
				);
			
				$xc = 40; // start of player data
				// for loop num players
				for($np=0;$np<$x[20];$np++)
				{
					$playerdat[$np]->name = $x[$xc];
					$xc ++;
					$playerdat[$np]->score = $x[$xc];
					$xc ++;
					$playerdat[$np]->ping = $x[$xc];
					$xc ++;
					$playerdat[$np]->team = $x[$xc];
					$xc ++;
				}
				
				if( $x[24] ) // team game.. get scores
				{
					$xc = $xc+5; // team scores
					$teamscor->red = $x[$xc];
					$xc = $xc + 2;
					$teamscor->blue = $x[$xc];			
				}
				
				return($array); // return above mentioned data
			} else {
				return 1; // x not set, no server found
			}
		}
}

?>