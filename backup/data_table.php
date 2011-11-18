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
 
 


		// Variables, and what they hold:
		
		// $j["hostname"] = Server's Name
		// $j["gamever"] = Halo Version
		// $j["hostport"] = [ unknown ] 
		// $j["maxplayers"] = Maximum players server is configured to hold
		// $j["password"] = 0 is no password, 1 is a password protected server
		// $j["mapname"] = Current maps name
		// $j["dedicated"] = 0 is not, 1 is a dedicated server
		// $j["gamemode"] = [ unknown ]
		// $j["game_classic"] = [ unknown ]
		// $j["numplayers"] = Current number of players on the server
		// $j["gametype"] = CTF, Slayer, etc
		// $j["teamplayer"] = Team play (1 = yes, 0 = no)
		// $j["gamevariant"] = Team Slayer, Iron CTF, etc
		// $j["fraglimit"] = Frag limit (or score limit, for CTF games)
		
	
?>

<p class="first">Viewing Information for<?php if ($j["dedicated"]) echo " a Dedicated "; ?> Server:</p>
<p><strong><font size="2"><?php echo $j["hostname"]; ?></font></strong></p>
<p><font size="1"><?php echo "$x:$y <a href=\"xfire:join?game=haloce&server=$x:$y\">Click to Join Via Xfire</a>"; ?></font></p>
<p class="first">&nbsp;</p>
<div align="center"><img src="mapname/<?php echo $j["mapname"]; ?>.gif" width="175" height="143"></div>
<div align="center"><?php
							 switch( $j["mapname"] )
							 {
							 	case "beavercreek":
									echo "Battle Creek";
									break;
								case "bloodgulch":
									echo "Blood Gulch";
									break;
								case "boardingaction":
									echo "Boarding Action";
									break;
								case "carousel";
									echo "Derelict";
									break;
								case "chillout";
									echo "Chillout";
									break;
								case "damnation";
									echo "Damnation";
									break;
								case "dangercanyon";
									echo "Danger Canyon";
									break;
								case "deathisland";
									echo "Death Island";
									break;
								case "gephyrophobia";
									echo "Gephryophobia";
									break;
								case "hangemhigh";
									echo "Hang 'Em High";
									break;
								case "icefields";
									echo "Ice Fields";
									break;
								case "infinity";
									echo "Infinity";
									break;
								case "longest";
									echo "Longest";
									break;
								case "prisoner";
									echo "Prisoner";
									break;
								case "putput";
									echo "Chiron TL34";
									break;
								case "ratrace";
									echo "Rat Race";
									break;
								case "sidewinder";
									echo "Sidewinder";
									break;
								case "timberland";
									echo "Timberland";
									break;
								case "unknown";
									echo "Unknown";
									break;
								case "wizard";
									echo "Wizard";
									break;
							}
							?></div>
<p class="first">&nbsp;</p>			
<p>Server Version: <b><?php echo $j["gamever"]; ?></b></p>
<p>This is a <?php if ($j["password"]) echo "<b>Private</b>"; else echo "<b>Public</b>"; ?> Server</p>
<p>There are <b><?php echo $j["numplayers"] . "</b> / <b>" . $j["maxplayers"]; ?></b> Players</p>
<p>Current game is <b><?php echo $j["gametype"]; ?></b></p>
<p><?php if($j["gamevariant"]) echo "Gametype is <b>" . $j["gamevariant"] . "</b>";?></p>
<p>The Score Limit is <b><?php echo $j["fraglimit"]; ?></b></p>

<p class="first">&nbsp;</p>	

<p><?php if( $j["teamplay"] ) echo "Team Scores:"; else echo "There is no Teamplay";?></p>
<?php if( $j["teamplay"] ) echo "<p>Red Team: <b>" . $teamscor->red . "</b></p>";?>
<?php if( $j["teamplay"] ) echo "<p>Blue Team: <b>" . $teamscor->blue . "</b></p>";?>

<p>&nbsp;</p>

<p class="first"><img src="player_s.gif" width="275" height="35"></p>

<table align="center" border="0" cellpadding="0"
 cellspacing="0" width="380">
  <tbody>
    <tr>
      <td width="20">&nbsp;</td>
      <td width="120">
      <div align="center"><strong><font size="2">Name</font></strong></div>
      </td>
      <td width="120">
      <div align="center"><strong><font size="2">Score</font></strong></div>
      </td>
<?php if( $j["teamplay"] ) {
echo "<td width=\"120\"><div align=\"center\"><strong><font size=\"2\">Team</font></strong></div></td>";
}
?>
    </tr>
    <tr>
      <td width="20">&nbsp;</td>
      <td width="120">&nbsp;</td>
      <td width="120">&nbsp;</td>
<?php if( $j["teamplay"] ) {
echo "<td width=\"120\">&nbsp;</td>";
}
?>
    </tr>
<?php for($zz=0; $zz<$j["numplayers"]; $zz++)
{
?>
    <tr>
      <td width="20">&nbsp;</td>
      <td width="120">
      <div align="center"><?php echo $playerdat[$zz]->name; ?></div>
      </td>
      <td width="120">
      <div align="center"><?php echo $playerdat[$zz]->score; ?></div>
      </td>
<?php if( $j["teamplay"] ) {
echo "<td width=\"120\"><div align=\"center\">";
if( $playerdat[$zz]->team == 0 )
echo "Red";
else
echo "Blue";
echo "</div></td>";
}
?>
    </tr>
<?php }
?>
  </tbody>
</table>
	  <p class="first">&nbsp;</p>
	  <p class="first">Query another server?</p>