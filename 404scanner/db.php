<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('date.timezone', 'Asia/Manila');


// MYSQL DEFINES 
define('MYSQLUSER' , "404scanner");
define('MYSQLPASS' , "404scanner");
define('MYSQLDB' , "404scanner");
define('MYSQLHOSTNAME' , "localhost");



function makeSafeName( $sqlstring )
{
	if(IsNullOrEmptyString($sqlstring)){
		$sqlstring = "NotSet";
	}
    $sqlstring = preg_replace("/[^A-Za-z0-9.]/", '', $sqlstring);
    return $sqlstring;
} 


function makeSafeSQL( $sqlstring )
{
	$sqlstring = preg_replace("/[^A-Za-z0-9.:]/", '', $sqlstring);
	return $sqlstring;
} 

function makeSafeMAILSQL( $sqlstring )
{
	$sqlstring = preg_replace("/[^A-Za-z0-9.:@]/", '', $sqlstring);
	return $sqlstring;
} 

function makeSafeContent( $sqlstring )
{
	$sqlstring = preg_replace("/[^A-Za-z0-9.:@]/", '', $sqlstring);
	return $sqlstring;
} 


function excuteSQL( $sqlstring )
{
	//printS($sqlstring);
        printS("MYSQLHOSTNAME".MYSQLHOSTNAME);
	$conn = new mysqli(MYSQLHOSTNAME, MYSQLUSER , MYSQLPASS , MYSQLDB);
	$conn->query($sqlstring);
    //printS(" excuteSQL: ". $sqlstring);
	//printS($sqlstring);
}

function selectSQL( $sqlstring ){
	//printS(" selectSQL: ". $sqlstring);

	$conn = new mysqli(MYSQLHOSTNAME, MYSQLUSER , MYSQLPASS , MYSQLDB);
	$result = $conn->query($sqlstring);

	$conn->close();
	return $result;
}

function insertLastId( $sqlstring ){
    //printS( " insertLastId: ". $sqlstring);

    $conn = new mysqli(MYSQLHOSTNAME, MYSQLUSER , MYSQLPASS , MYSQLDB);
    $result = $conn->query($sqlstring);
    $lastId = $conn->insert_id;
    $conn->close();
    return $lastId;
}





function printS($sqlstring){
	echo (date('H:i:s', time()) . ": ".  $sqlstring ."\n");
}


function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}


function removeMailTo($email){
        $email = str_replace("mailto:", '', $email); 
		return $email ;
}

function removeHttp($url){

        $url = str_replace("'", '', $url); 
        $url = str_replace('"', '', $url); 

        if(substr($url, -1) == '/'){
            $url = substr($url, 0, -1);
        }

        $prefix = 'http://';
        if (substr($url, 0, strlen($prefix)) == $prefix) {
            $url = substr($url, strlen($prefix));
        } 

        $prefix = 'https://';
        if (substr($url, 0, strlen($prefix)) == $prefix) {
            $url = substr($url, strlen($prefix));
        } 

        $prefix = '//';
        if (substr($url, 0, strlen($prefix)) == $prefix) {
            $url = substr($url, strlen($prefix));
        }

    return $url;
}

function startsWith($haystack, $needle)
{
  $length = strlen($needle);
  return (substr($haystack, 0, $length) === $needle);
}

function cotains($haystack, $needle){
    if(!(strpos($haystack, $needle) !== false)){
		return false;
	} 
	return true;
	// return (strpos($haystack, $needle) !== false) ; 
}

function parseHeaders( $headers )
{
    $head = array();
    foreach( $headers as $k=>$v )
    {
        $t = explode( ':', $v, 2 );
        if( isset( $t[1] ) )
            $head[ trim($t[0]) ] = trim( $t[1] );
        else
        {
            $head[] = $v;
            if( preg_match( "#HTTP/[0-9\.]+\s+([0-9]+)#",$v, $out ) )
                $head['reponse_code'] = intval($out[1]);
        }
    }
    return $head;
}



?>