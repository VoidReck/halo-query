<?php
////////////////////////////////////////////////////
//          -------------------------------       //
//          Halo PC Server Querying Utility       //
//             Version: 1.01                      //
//                [ release: 10.08.03 ]           //
//          -------------------------------       //
////////////////////////////////////////////////////


// Written by Alex Bain ( nontent@nontent.net )
//
// To check for the most recent version please visit:
//  http://www.nontent.net/halo_query

?>

<html>
<head>
<title>Halo Server Query</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="nontent.css" rel="stylesheet" type="text/css">
</head>

<body>
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
  <table width="470" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="470" border="0" align="left" cellpadding="0" cellspacing="0" class="shadow-outter">
              <tr> 
                <td><table width="470" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td><table width="470" border="0" cellspacing="0" cellpadding="0"  class="shadow-inner">
                          <tr> 
                            <td height="23"  class="tdbg-and-border"> 
                              <div align="center"> </div>
                              <table width="470" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td width="10" height="5"></td>
                                  <td height="5"></td>
                                  <td width="10" height="5"></td>
                                </tr>
                                <tr> 
                                  <td width="10"></td>
                                  <td><div align="center"><a href="index.php"><img src="title_s.gif" width="275" height="35" border="0"></a> 
                                </div>
                                <table width="450" border="0" cellpadding="0" cellspacing="0">
                                  <tr> 
                                    <td width="150"> <div align="center">IP Address</div></td>
                                    <td width="150"> 
                                      <div align="center">Port 
                                        Number</div></td>
                                    <td width="150"> 
                                      <div align="center">Submit Query </div></td>
                                  </tr>
                                  <tr> 
                                    <td width="150" height="20"> 
                                      <div align="center"> 
                                        <input name="ip" type="text" size="18">
                                      </div></td>
                                    <td width="150" height="20"> 
                                      <div align="center"> 
                                        <input name="port" type="text" value="2302" size="7">
                                      </div></td>
                                    <td width="150" height="20"> 
                                      <div align="center"> 
                                        <input type="submit" value="Query Server">
                                      </div></td>
                                  </tr>
                                </table>
                                <br>
                                  </td>
                                  <td width="10"></td>
                                </tr>
                                <tr> 
                                  <td width="10" height="5"></td>
                                  <td height="5"></td>
                                  <td width="10" height="5"></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            
          </td>
        </tr>
      </table>
  <br>
  <p>&nbsp;</p>
</form>

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