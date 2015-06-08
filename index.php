<?php

date_default_timezone_set('America/Chicago');


class Page
{

	var $path;
	var $dev;
	var $rowLimit = 10;
	
	public function __construct() {
		require (__DIR__ . '/photo_sections.php');
		$local_path = '/Users/charlie/Sites/Matt Lankes/mattlankes';
		$remote_path = __DIR__;
		if (is_dir($local_path)) {
			$this->path = $local_path;
			$this->dev = 1;
		} else {
			$this->path = $remote_path;
		}
	}

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
			<li><a href="/peru"';
			if ($control == 'peru') echo ' class="selected"';
			echo '>Peru</a></li>
			<li><a href="/advertising"';
			if ($control == 'advertising') echo ' class="selected"';
			echo '>Advertising</a></li>
			<li><a href="/boyhood"';
			if ($control == 'boyhood') echo ' class="selected"';
			echo '>Boyhood</a></li>
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
		
		if (isset($a)) {
			$picsonpage=count($a);
			$suffix = 1;
		} else {
			$dir = $this->path . '/assets/' . $control . '/pics';
			if (is_dir($dir)) {
				$a = array();
				if ($handle = opendir($dir)) {
    				while (false !== ($entry = readdir($handle))) {
        				if (stripos($entry, '.jpg') !== FALSE) {
							$a[] = $entry;
						}
    				}
    				closedir($handle);
				}

				$picsonpage=count($a);
				$suffix = 0;
			}
			
		}
		
		// print_r($a);

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

				break;

			case 'fastfoodnation':

				print '
<div id="topnote">
First I want to thank Richard Linklater for inviting me to be a part of the film.  All of the portraits you see were shot while on location and during the filming of the movie. We shot in Austin, Colorado, and Mexico. They were all shot using a 4x5 field camera and polaroid film.<br /><br />
Rick and I talked about shooting this project in a documentary style, capturing the character of the person. It really was fun to be on set and have access to these wonderful actors. We would have to shoot in between scenes off set but close enough so the actors could be called back quickly. I hope you enjoy looking at these as much as I enjoyed taking them. Thank you.</p>

</div>
';

			break;



		endswitch;

		print '
<div id="thumbs">
';

 		for ($i=0;$i<$picsonpage;$i++):

			print '
   		<div id="thumbstd">';
   		
   			if  ((isset($rand)) && ($i==$rand)) {

				print '<a href="http://www.laf.org"><img width="100" height="100" src="/assets/laf_logo.gif" alt="Lance Armstrong Foundation" /></a></div>';

			} else {
   			
   				$src = '/assets/'.$control.'/thumbs/'.$a[$i];
   				if ($suffix === 1) {
   					$src .= '.jpg';
   				}
   				// echo $src;
   				if ( ! file_exists($this->path . $src)) {
   					$src = '/assets/'.$control.'/pics/'.$a[$i];
   					if ($suffix === 1) {
   						$src .= '.jpg';
   					}
   				}
   				
   				print '<a href="/'.$control.'/'.$i.'"><img width="100" height="100" src="' . $src . '" alt="" /></a></div>';
   			
   			}

   		endfor;

   		print '

</div>
';


	}


	function picture($section,$pic)
	{

		$a=$this->$section;
		$suffix = 1;
		
		if ( ! isset($a)) {
			$dir = $this->path . '/assets/' . $section . '/pics';
			$a = array();
			if ($handle = opendir($dir)) {
    			while (false !== ($entry = readdir($handle))) {
        			if (stripos($entry, '.jpg') !== FALSE) {
						$a[] = $entry;
					}
    			}
    			closedir($handle);
			}
			$suffix = 0;
		}
		
		$picname=$a["$pic"];
		$picsonpage=count($a);
		$l = $picsonpage - 1;

		if ($pic==0) {$prev=$l;} else {$prev=$pic-1;}
		if ($pic==$l) {$next=0;} else {$next=$pic+1;}

		$left='<a id=\"left\" href=\"/$section/$prev\"><img class=\"arrow\" width=\"14\" height=\"10\" src=\"/assets/left_arrow.gif\" vspace=\"2\" hspace=\"2\" /></a>';
		$right='<a id=\"right\"  href=\"/$section/$next\"><img class=\"arrow\" width=\"14\" height=\"10\" src=\"/assets/right_arrow.gif\" vspace=\"2\" hspace=\"2\" /></a>';
		eval ("\$k=\"$left\";");
		eval ("\$j=\"$right\";");

		$src = "/assets/$section/pics/$picname";
		if ($suffix === 1) $src .= '.jpg';
	
		if (file_exists($this->path.$src)) {
			list($width,$height,$type,$attr)=getimagesize($this->path.$src);
			if ($width > 800) $width=800;
		}

		print '
    		<div id="pic">
          		<div id="arrows">'.$k;

		print ' <div id="caption">';
		if (file_exists($this->path."/assets/$section/captions/$picname.inc")) {
			include_once($this->path."/assets/$section/captions/$picname.inc");
		} else {
			if ($this->dev === 1) print($picname);
		}
		print '</div>';

		print $j.'</div>
          		<div id="mainpic" style="max-width: ' . $width. 'px"><img src="'.$src.'" border="0" alt="" /><!--<p>'.$picname.'</p>--></div>
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
<title>Matt Lankes Photography</title>
</head>
<body>
<?php
$page->content();
echo '
<div id="copyright">
	<p>&copy; Matt Lankes 2001-'.date("Y").'. All rights reserved.<br />
	Prints available. <a href="mailto:MattLankes@mac.com">Ask Matt</a> for prices and sizes.</p>
</div>
</body>
</html>';
