<?php
//Audio File information library
require_once('getid3/getid3.php');

$getID3 = new getID3;

?>
<form enctype="multipart/form-data" action="SubeMP3.php" method="POST">
<select class="form-control idg" name="accion" required>
	<option value="encode">ENCODEAR</option>
	<option value="decode">DES-ENCODEAR</option>
</select>
<input name="ArchivoSubido" type="file" />
<input type="submit" value="Subir archivo" />
</form> 

<?php

$path = 'audio/audioAndres/snowflake_-_Heartbeat.mp3';

$mixinfo = $getID3->analyze( $path );

// Optional: copies data from all subarrays of [tags] into [comments] so
// metadata is all available in one location for all tag formats
// metainformation is always available under [tags] even if this is not called

getid3_lib::CopyTagsToComments($mixinfo); //descomentar

// Output desired information in whatever format you want
// Note: all entries in [comments] or [tags] are arrays of strings
// See structure.txt for information on what information is available where
// or check out the output of /demos/demo.browse.php for a particular file
// to see the full detail of what information is returned where in the array

/*
_____________________________________________________________________________________________________________________________

 echo $mixinfo['comments_html']['artist'][0]; // artist from any/all available tag formats
 echo "</br>";
 echo $mixinfo['tags']['id3v2']['title'][0];  // title from ID3v2
 echo "</br>";
 $bit_rate = $mixinfo['audio']['bitrate'];           // audio bitrate
 $play_time = $mixinfo['playtime_string'];            // playtime in minutes:seconds, formatted string

print_r($mixinfo);

list($mins , $secs) = explode(':' , $play_time);

if($mins > 60)
{
    $hours = intval($mins / 60);
    $mins = $mins - $hours*60;
}

$play_time = sprintf("%02d:%02d:%02d" , $hours , $mins , $secs);
echo "</br>";
echo $play_time;

$play_time_directo = $mixinfo['playtime_string'];
echo "</br>";
echo $play_time_directo;

*/
?>
