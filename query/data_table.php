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
<table width="470" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <table width="470" border="0" align="left" cellpadding="0" cellspacing="0" class="shadow-outter">
        <tr> 
          <td><table width="470" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td><table width="470" border="0" cellspacing="0" cellpadding="0"  class="shadow-inner">
                    <tr> 
                      <td height="23" class="tdbg-and-border"> 
                        <div align="center"> </div>
                        <table width="470" border="0" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td width="10" height="5"></td>
                            <td height="5"></td>
                            <td width="10" height="5"></td>
                          </tr>
                          <tr> 
                            <td width="10"></td>
                            <td> <table width="450" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td> <table width="175" height="143" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td height="50"><a href="index.php"><img src="title_s.gif" width="275" height="35" border="0"></a></td>
                                      </tr>
                                      <tr> 
                                        <td><div align="center">Viewing Information 
                                            for 
                                            <?php if ($j["dedicated"]) echo "Dedicated "; ?>
                                            Server:<br>
                                          </div></td>
                                      </tr>
                                      <tr> 
                                        <td><div align="center"><strong><font size="4"><?php echo $j["hostname"]; ?></font></strong><br>
                                          </div></td>
                                      </tr>
                                      <tr> 
                                        <td><div align="center"><font size="1"><?php echo "<a href=\"udp://$x:$y\">udp://$x:$y</a>"; ?></font></div></td>
                                      </tr>
                                    </table></td>
                                  <td width="175"> <div align="center"><img src="mapname/<?php echo $j["mapname"]; ?>.gif" width="175" height="143"></div></td>
                                </tr>
                                <tr> 
                                  <td><div align="center"></div></td>
                                  <td width="175"><p align="center"><b> 
                                      <?php
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
							?>
                                      </b> </p></td>
                                </tr>
                                <tr> 
                                  <td height="14">Running Version: <b><?php echo $j["gamever"]; ?></b></td>
                                  <td height="14">&nbsp;</td>
                                </tr>
                                <tr> 
                                  <td height="14">This is a 
                                    <?php if ($j["password"]) echo "<b>Private</b>"; else echo "<b>Public</b>"; ?>
                                    Server<br> </td>
                                  <td width="175" height="14"> <div align="center"> 
                                      <?php if( $j["teamplay"] ) echo "Team Scores:";?>
                                    </div></td>
                                </tr>
                                <tr> 
                                  <td height="14">There are <b><?php echo $j["numplayers"] . "</b> / <b>" . $j["maxplayers"]; ?></b> 
                                    Players</td>
                                  <td width="175" height="14"> <div align="center"></div></td>
                                </tr>
                                <tr> 
                                  <td height="14">Current game is <b><?php echo $j["gametype"]; ?></b> 
                                    <?php if($j["gamevariant"]) echo ", of type <b>" . $j["gamevariant"] . "</b>";?>
                                  </td>
                                  <td height="14"> 
                                    <?php if( $j["teamplay"] ) echo "Red Team: <b>" . $teamscor->red . "</b>";?>
                                  </td>
                                </tr>
                                <tr> 
                                  <td height="14">The Frag/Score Limit is <b><?php echo $j["fraglimit"]; ?></b></td>
                                  <td height="14"> 
                                    <?php if( $j["teamplay"] ) echo "Blue Team: <b>" . $teamscor->blue . "</b>";?>
                                  </td>
                                </tr>
                                <tr> 
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                              </table></td>
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
      </table></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td> <table width="470" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="470" border="0" align="left" cellpadding="0" cellspacing="0" class="shadow-outter">
              <tr> 
                <td><table width="470" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td><table width="470" border="0" cellspacing="0" cellpadding="0"  class="shadow-inner">
                          <tr> 
                            <td height="23" class="tdbg-and-border"> 
                              <div align="center"> </div>
                              <table width="470" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td width="10" height="5"></td>
                                  <td height="5"></td>
                                  <td width="10" height="5"></td>
                                </tr>
                                <tr> 
                                  <td width="10"></td>
                                  <td><div align="center"><img src="player_s.gif" width="275" height="35"> 
                                    </div>
                                    <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td width="150"> <div align="center"><strong><font size="2">Name</font></strong></div></td>
                                        <td width="150"> <div align="center"><strong><font size="2">Score</font></strong></div></td>
                                        <?php if( $j["teamplay"] )	
										{
   											echo "<td width=\"150\"><div align=\"center\"><strong><font size=\"2\">Team</font></strong></div></td>";
										}
										?>
                                      </tr>
                                      <tr> 
                                        <td width="150">&nbsp;</td>
                                        <td width="150">&nbsp;</td>
                                        <?php if( $j["teamplay"] )	
										{
    										echo "<td width=\"150\">&nbsp;</td>";
										}
										?>
                                      </tr>
                                      <?php
										for($zz=0; $zz<$j["numplayers"]; $zz++)
										{
									  ?>
                                      <tr> 
                                        <td width="150"> <div align="center"><?php echo $playerdat[$zz]->name; ?></div></td>
                                        <td width="150"> <div align="center"><?php echo $playerdat[$zz]->score; ?></div></td>
                                        <?php if( $j["teamplay"] )	
										{
   										  echo "<td width=\"150\"><div align=\"center\">";
										  if( $playerdat[$zz]->team == 0 )
										  	echo "Red";
										  else
										    echo "Blue";
		
											echo "</div></td>";
										}
										?>
                                      </tr>
                                      <?php
										}
									  ?>
                                    </table>
                                    <br> </td>
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
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<p>&nbsp;</p>
