<?php
/*
 *
 */
function getDomainName($url)
{
	// obtiene el nombre del host de la URL
	preg_match('@^(?:http://)?([^/]+)@i',
	$url, $coincidencias);
	$host = $coincidencias[1];
	// obtiene los dos últimos segmentos del nombre del host
	preg_match('/[^.]+\.[^.]+$/', $host, $coincidencias);
	echo "<br>El nombre de dominio es: {$coincidencias[0]}";
}
/*
 *
 */
function get_title($str)
{
  //$str = file_get_contents($url);
  if(strlen($str)>0){
    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case    
	echo "<br>El titulo de la pagina es: ".$title[1];
	return $title[1];
  }
}
/*
 *
 */
function get_tags($source,$tag)
{	
	$pat_attributes ='#(<.+?>)#';
	preg_match_all($pat_attributes, $source, $matches);
	
	foreach( $matches as $match ){
		$i=01;
		foreach( $match as $mat ){
			echo "<br>::$i::".htmlspecialchars($mat);
			$i+=1;
		}
		break;
	}	
}
/*
 *
 */
function getContentTag($source,$tag)
{	
	$pat_attributes ='#(<'.$tag.'.+?>)(.*?)(</'.$tag.'>)#';	
	
	$pat_attributes ='/<'.$tag.'[^>]*?>([\\s\\S]*?)<\/'.$tag.'>/';
	
	echo "<br>".htmlspecialchars($pat_attributes)."<br>";
	preg_match_all($pat_attributes, $source, $matches); 
	echo "<pre>";
	print_r( $matches );
	echo "</pre>";
	
	/*
	foreach( $matches as $match ){
		$i=01;
		foreach( $match as $mat ){
			//echo "<br>::$i::".htmlspecialchars($mat);
			echo "<br>::$i::".($mat);
			$i+=1;
		}
		break;
	}
	*/
	
}
/*
 *
 */


	//echo get_title("http://www.washingtontimes.com/");

	$url = "http://www.washingtontimes.com/";
	getDomainName($url);
	$code = file_get_contents($url);
	get_title($code);
	
	getContentTag($code,"div");
	
	
	
	//echo $code;
	
	/*
	echo "<pre>";
	print_r( get_tags($code,"h2") );
	echo "</pre>";
	*/


?>




