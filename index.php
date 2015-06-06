<?php
class Page
{

	// photo sections
	var $faces = array (
'allison', 'baeworkers', 'caroline', 'chiefacevedo', 'cindy', 'derek', 'guyforsyth', 'lancearmstrong', 'sineadhowth', 'twins', 'willaelidarden',
'abby', 'adrianne', 'amy', 'bethandhannah', 'billyjoeshaver', 'brianna',
'damianandboys', 'gregkinnear2011', 'jamie', 'katandtristan', 'kathyvalentine', 'katiewaller',
'kay', 'lily', 'melanie', 'mirandacover', 'mirandalambert', 'patriciajumping',
'robertpatricia', 'robertrodriguez', 'sanjaygupta', 'taylor', 'willie2011',
'willie','keanu','jeybo-belize','trio','samshepard','winona',
'sophie','ethanmay05','hannah','downey','sineadside','gaelgarciabernal',
'nancy','jacksonmay05','buffybowling','woody','tommyleejones','virgin',
'statham','whitneyleaf','rory','ricklinklater','kat','lizcarpenter',
'Vivian','viggo-mortensen','appaloosa-sheriff','argos-maccallum-appaloosa','dancers','erin-nic-marathon',
'erin-marathon','jeremy-irons-appaloosa','lance-henrikson-appaloosa','pinetop-perkins','reneezel','Andrea'
);

	var $places = array (
'bats2011', 'bluebonnets2011', 'centralpark2011', 'frigatebirds2011', 'iloveyousomuch2011', 'lakeaustinducks2011', 'marathonsign2011', 'pigeons2011', 'pumpjack2011', 'sitkacemetery2011', 'windmills2011',
'monumentflag','seal','zebras','cactus','wedding','frenchcountryside',
'morocco','horses','big-ben','albino-peacock','chicago-towers','gear',
'rrsign','crosspalms','oliver','dino-santa-monica','highland-cow-scotland','train',
'lighthouse-lake-michigan','lighthouse-maine','frenchfenceline','london-birds','liberty','willieluck',
'peace-ball-london','irishchair','horsescowboy','freeandkaya','viaductchaumont','seagulls',
'pumpjack-midland','san-francisco','santa-fe','hyde-park-swan','tree-tennessee','westminster-abbey');

	var $music = array (
'2011billyjoe1', '2011billyjoe2', '2011billyjoe3', '2011byrne', '2011crosscanadian', '2011loslonely', '2011rubyjane', '2011rubyjane2', '2011shawncolvin', '2011spoon', '2011woodsboss',
'ACL-cityscape','arc-angels-alamo','austin-family-jewels','blues-traveller','brennen-leigh','charlie','chris-martin','coldplay','darden-smith','flatlanders','franz-ferdinand','grady','jane-bond','jet','joss-stone','lyle-lovett','MIA','nic-armstrong','oasis','paolo-nutini','patricia-vonne','pete-yorn','pinetop-perkins2','regina-spektor','seth-and-brennen','wilco','willie-playing-chess-luck,tx','ziggy-1','ianmoore','ziggy-4');

	var $livestrong = array (
'west','daoud','rothaus','cohen','dolezal','edwards',
'clark','riner','gomez','family','herron','cusack',
'albee','griffith','aldredge','dilbeck','nohr','behnke',
'gillespie','phillips','atkins','gialella','theobat','lino',
'pax','vangiesen','swanson','bennett','eskimo','zavala');

	var $fastfoodnation = array (
'albino','anaclaudia','ashleyjohnson','avrillavigne','bobbycanavalle','catalina',
'cattle','cow24','cowprocessing1','cowprocessing2','cowprocessing3','cowprocessing4',
'ethanhawkeffn','evahernandez','ffnposter','franciscorosales','frankertl','gregkinnear',
'guillermoperez','juancarlosserran','kriskristoffersonffn','loupucci','luisguzman','magdaleno',
'makingthecrossing','pauldano','safetyman','transportvan','trimmingline','wilmervalderrama');

	var $chevy = array (
'chevy20s', 'chevy30s', 'chevy40s1', 'chevy40s2', 'chevy50s', 'chevy50sgirl', 'chevy50sgirl2', 'chevy70s', 'chevydogs', 'chevysx-70');

	var $stills = array (
'appaloosa_01', 'appaloosa_02', 'appaloosa_03', 'appaloosa_04', 'appaloosa_05', 'appaloosa_06',
'appaloosa_07', 'appaloosa_08', 'appaloosa_09', 'appaloosa_10', 'appaloosa_11', 'appaloosa_12',
'appaloosa_13', 'appaloosa_14', 'appaloosa_15',
'ascanner_1', 'ascanner_2', 'ascanner_3', 'ascanner_4', 'ascanner_5', 'djqualls',
'downtownfordemocracy_01', 'downtownfordemocracy_02', 'downtownfordemocracy_03',
'heathergraham', 'kriskristofferson','patriciaarquette', 'patriciavonne',
'theking_01', 'theking_02', 'theking_03', 'theking_04', 'theking_05', 'theking_06', 'theking_07', 'theking_08', 'theking_09',
'theking_10', 'theking_11', 'theking_12', 'theking_13', 'theking_14', 'theking_15', 'theking_16', 'theking_17', 'theking_18',
'wendellbaker_00', 'wendellbaker_01', 'wendellbaker_02', 'wendellbaker_03', 'wendellbaker_04', 'wendellbaker_05'
);

	var $path = '/vservers/mattlankescom/htdocs';
	var $rowLimit = 10;

	function parse_uri()
	{
		$queso=$_SERVER['REQUEST_URI'];
		for ($i=strtok((substr($queso,1,(strlen($queso)-1))),"/");$i!="";$i=strtok("/")) {
			$i=str_replace("index.php","",$i);
			$i=ereg_replace("\?.*","",$i);
	    	$control[]=$i;
	    }
	 	if (sizeof($control)==0) $control[0]='home';
	 	return $control;
	}


	function nav($control)
	{

		echo  '
<div id="logo"><a href="/"><img src="/assets/nav_logo.gif" width="169" height="50" alt="Matt Lankes Photography" /></a></div>

<div id="nav">
		<ul>
			<li class="first"><a href="/faces"';
			if ($control == 'faces') echo ' class="selected"';
			echo '>Faces</a></li>
			<li><a href="/places"';
			if ($control == 'places') echo ' class="selected"';
			echo '>Places</a></li>
			<li><a href="/music"';
			if ($control == 'music') echo ' class="selected"';
			echo '>Music</a></li>
			<li><a href="/stills"';
			if ($control == 'stills') echo ' class="selected"';
			echo '>Stills</a></li>
			<li><a href="/chevy"';
			if ($control == 'chevy') echo ' class="selected"';
			echo '>Chevy</a></li>
			<li><a href="/livestrong"';
			if ($control == 'livestrong') echo ' class="selected"';
			echo '>LiveStrong</a></li>
			<li><a href="/fastfoodnation"';
			if ($control == 'fastfoodnation') echo ' class="selected"';
			echo '>Fast Food Nation</a></li>
			<li class="last"><a href="/about"';
			if ($control == 'about') echo ' class="selected"';
			echo '>About Matt</a></li>
		</ul>
	</div>
';

	}


	function content()
	{

		$control=$this->parse_uri();
		$a=$control[0];$b=$control[1];

		$this->nav($a);

		if ($a=='home') {

			$this->home();

		} else {

			if (count($control) == 2) {			// show that picture

				$this->picture($a,$b);

			} else {

				$this->section($a);

			}

		}

	}

	function home()
	{

?>
<div id="home">
<a href="/faces"><img src="/assets/places/pics/jeybo-belize.jpg" alt="Welcome" /></a>
</div>
<?php

	}


	function section($control)
	{

		$a=$this->$control;
		$picsonpage=count($a);

		switch ($control):

			case 'about':

?>

<div id="address">
<p class="bigreg">
PO Box 300045<br />Austin, Texas 78703<br />
512.789.7448<br />
<a href="mailto:MattLankes@mac.com" class="bigreg">MattLankes@mac.com</a></p>
<img src="/assets/matt_2015.png" width="300" height="386" alt="Matt Lankes" />
</div>


<div id="bio">

<p class="reg">Matt Lankes, a seventh-generation Texan, grew up in Austin playing soccer and 

watching his father take pictures for the <i>Austin American-Statesman</i>. "I grew up around 

the camera," says Lankes who has made his living through photography since attending 

St. Edward’s University, specializing in portraits of people in their environments. "I try to 

get to the core of the person," says Lankes, who likes to spend time with his subject. "I 

try to make a portrait that shows who a person really is. I think that one thing that runs 

through most of my pictures is that the subjects are not posing; they are relaxed, and not 

putting on a face." Lankes credits his children, Sinead and Nicholas, with keeping him 

focused. "They’re my inspiration," he says. In his spare time, Lankes still loves to play 

soccer and travel the world.</p>

<p class="reg">Lankes' clients include  HBO, LiveStrong, Y&R, <i>Texas Music</i>, 

<i>Fox Searchlight</i>, <i>Texas Monthly</i>, <i>New York Times</i>, <i>Interview</i>,

<i>Time Inc.</i>, <i>Newsweek</i>, GSD&M, <i>Austin Monthly</i>, Lee Jeans, 

<i>Random House</i>, Warner Brothers, <i>Cowboys and Indians</i>, 

Chevy and Pentagram Design.</p>

<p class="reg">Lankes currently has his work in the permanent collection of 

The National Portrait Gallery at the Smithsonian and at

The Wittliff Collections at Texas State University.</p>

</div>

<?php

			break;

			case 'livestrong':

				// to put in random link to LAF
				mt_srand((double)microtime()*1000000);
				$rand=mt_rand(1,$picsonpage);

				print '
<div id="topnote">All of the people you see here are cancer suvivors...<br />
I tried to capture their &ldquo;spirit of survivorship&rdquo; for the <a href="http://www.laf.org">Lance Armstrong Foundation</a><br />
They are amazing and incredibly strong!</div>
';

				print '
<table id="thumbs">
  	<tr>';

				for ($i=0;$i<$picsonpage;$i++):

					if ($i==$rand) {

						print '<td id="thumbstd"><a href="http://www.laf.org"><img width="100" height="100" src="/assets/laf_logo.gif" alt="Lance Armstrong Foundation" /></a></td>';

					} else {

						print '
   		<td id="thumbstd"><a href="/'.$control.'/'.$i.'"><img width="100" height="100" src="/assets/'.$control.'/thumbs/'.$a[$i].'.jpg" alt="" /></a></td>';

					}

					if (($i<$picsonpage)&&(($i+1)%$this->rowLimit==0)) print '
	</tr>
  	<tr>
';

   				endfor;

   			print '
  	</tr>
</table>
';
				break;

			case 'fastfoodnation':

				print '
<div id="topnote">
First I want to thank Richard Linklater for inviting me to be a part of the film.  All of the portraits you see were shot while on location and during the filming of the movie. We shot in Austin, Colorado, and Mexico. They were all shot using a 4x5 field camera and polaroid film.<br /><br />
Rick and I talked about shooting this project in a documentary style, capturing the character of the person. It really was fun to be on set and have access to these wonderful actors. We would have to shoot in between scenes off set but close enough so the actors could be called back quickly. I hope you enjoy looking at these as much as I enjoyed taking them. Thank you.</p>

</div>
';

				print '
<table id="thumbs">
  	<tr>';

 				for ($i=0;$i<$picsonpage;$i++):

					print '
   		<td id="thumbstd"><a href="/'.$control.'/'.$i.'"><img width="100" height="100" src="/assets/'.$control.'/thumbs/'.$a[$i].'.jpg" alt="" /></a></td>';

					if (($i<$picsonpage)&&(($i+1)%$this->rowLimit==0)) print '
	</tr>
  	<tr>
';

   				endfor;

   			print '
  	</tr>
</table>
';
			break;


			default:

				print '
<table id="thumbs">
  	<tr>';

 				for ($i=0;$i<$picsonpage;$i++):

					print '
   		<td id="thumbstd"><a href="/'.$control.'/'.$i.'"><img width="100" height="100" src="/assets/'.$control.'/thumbs/'.$a[$i].'.jpg" alt="" /></a></td>';

					if (($i<$picsonpage)&&(($i+1)%$this->rowLimit==0)) print '
	</tr>
  	<tr>
';

   				endfor;

   			print '
  	</tr>
</table>
';

		endswitch;

	}


	function picture($section,$pic)
	{

		$a=$this->$section;
		$picname=$a["$pic"];
		$picsonpage=count($a);
		$l = $picsonpage - 1;

		if ($pic==0) {$prev=$l;} else {$prev=$pic-1;}
		if ($pic==$l) {$next=0;} else {$next=$pic+1;}

		$left='<a href=\"/$section/$prev\"><img class=\"arrow\" width=\"14\" height=\"10\" src=\"/assets/left_arrow.gif\" vspace=\"2\" hspace=\"2\" /></a>';
		$right='<a href=\"/$section/$next\"><img class=\"arrow\" width=\"14\" height=\"10\" src=\"/assets/right_arrow.gif\" vspace=\"2\" hspace=\"2\" /></a>';
		eval ("\$j=\"$left\";");
		eval ("\$k=\"$right\";");

		if (file_exists($this->path."/assets/$section/pics/$picname.jpg")) list($width,$height,$type,$attr)=getimagesize($this->path."/assets/$section/pics/$picname.jpg");

		print '
    		<table>
        		<tr valign="top">
          			<td id="arrows">'.$k;

		if (file_exists($this->path."/assets/$section/captions/$picname.inc")) {
			print ' <div id="caption">';
			include_once($this->path."/assets/$section/captions/$picname.inc");
			print '</div>';
		}

		print $j.'</td>
          			 <td><img src="/assets/'.$section.'/pics/'.$picname.'.jpg" width="'.$width.'" height="'.$height.'" border="0" alt="" /><!--<p>'.$picname.'</p>--></td>
        		</tr>
    		</table>

';

	}

}

$page=new Page;
?><!DOCTYPE html>
<html lang="en-us">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<meta name="keywords" content="Matt Lankes Photography, Matt Lankes, Photography" />
<link type="text/css" rel="stylesheet" href="/assets/style.css" media="screen" />
<!--[if IE]><link type="text/css" rel="stylesheet" href="/assets/ie.css" /><![endif]-->
<title>Matt Lankes Photography</title>
</head>
<body>
<?php
$page->content();
echo '
<div id="copyright">
	<p>&copy; Matt Lankes 2001-'.date("Y").'. All rights reserved.</p>
	<p>Prints available. <a href="mailto:MattLankes@mac.com">Ask Matt</a> for prices and sizes.</p>
</div>
</body>
</html>';
