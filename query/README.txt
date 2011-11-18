-------------------------------
Halo PC Server Querying Utility
   Version: 1.01
   [ release: 10.08.03 ]
-------------------------------

 - Written by Alex Bain (nontent@nontent.net)
 	(http://www.nontent.net)


Description:
---------------------------

 This is a PHP script that allows a user to query a Halo PC server, and will 
return the stats of the game currently being played, along with the players
in the server, their scores, and what team they are on (if applicable).

 Currently the script only supports IP addresses, but hostnames will be 
implemented in an upcoming release.


Installation Instructions:
---------------------------

 Copy the files included in this archive to a web server with a recent version
of PHP installed.

 Note: This script will only work on PHP versions of 4.30 an above. If you have
an older version of PHP you can download the newest version at www.php.net.


Files, and what they do:
---------------------------

 - index.php
   + php functions stored here, all execution is done in this file

 - data_table.php
   + the layout of the returned query is parsed and shown in this file
   + this file is called and included from index.php

 - nontent.css
   + Cascading style sheet file. Modify to suit your color preferences
   + all images have a transparent background, and will look fine with
     a different background color

 - images in mapname folder
   + these are the images of the maps that Halo supports
     [ images thanks to Brian Hurley ]   


Use:
---------------------------

 Open up index.php in any web browser, enter an IP address / port into the
fields, and click the "Query Server" button. The resulting page will show 
relevant information about the current server.

 The IP address and the port is passed through the query string in the URL,
so one is able to favorite a server query, if desired. This would allow
one to create a link directly to their server.


Support:
----------------------------

 This script is offered with minimal technical support. If you have any questions
about installation or configuration please send an email to nontent@nontent.net.

 I will compile a FAQ and release it at http://www.nontent.net/halo_query
if the need arises.



Version History:
---------------------------

[10.08.03] 1.01: Fixed PHP function call that not supported < 4.30, CSS file now contains all font/color data
[10.08.03] 1.0: Released to public


To check for the most recent version please visit:
  http://www.nontent.net/halo_query





