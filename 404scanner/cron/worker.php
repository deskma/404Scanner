<?php
require('../db.php');
printS( 'Current PHP version: ' . phpversion());
// the worker is CLI
// start it with
/*
start windows
cmd
PATH=%PATH%;C:\Ampps\php-7.1
cd C:\Ampps\www\404scanner\cron
php worker.php
*/

// https://try.powermapper.com/demo/ViewScan/4f359cfb-97cf-4c5f-8aa2-ff2ae3afe085
// https://www.powermapper.com/buy/all/ondemand/

// https://www.facebook.com/groups/44076347394/permalink/10153850872582395/?comment_id=10153850949412395&ref=notif&notif_t=group_comment&notif_id=1492003335672756

// Find all links to you home page  - inurl:boolex.com ?
// Find all links to you home page  - Link:boolex.com ?

/*//*//*//*//*//*//*//*//*//*//*//*//*//*/
/*//*  SETTINGS   *//*//*//*//*//*//*//*/
/*///*//*//*//*//*//*//*//*//*//*//*//*/

$cleantest = true;
$MAXNumbersOfScans = 20000 ; 
$MAXRounds = 8;


/*//*//*//*//*//*//*//*//*//*//*//*//*//*//*//*/
/*//*//*//*//*//* PROGRAM START  *//*//*//*//*/
/*//*//*//*//*//*//*//*//*//*///*//*//*//*//*/

$NumbersOfScans = 0 ; 
$Rounds = 0 ;

// cleanup
if ($cleantest) {
	printS('');
	printS( " ---- * ---- * ---- * ---- * ----- ");
	printS( " ---- * TRUNCATE  ALL      * ----- ");
	printS( " ---- * ---- * ---- * ---- * ----- ");

    excuteSQL("TRUNCATE sites_link "); // TODO only in test
    excuteSQL("TRUNCATE link_link "); // TODO only in test
    excuteSQL("TRUNCATE link "); // TODO only in test
    excuteSQL("TRUNCATE site_email ");
    excuteSQL("DELETE FROM `sites` WHERE `sites`.`site_id` > 100 ");

    // Get and delete all files
    $files = glob('./tmp/*'); // get all file names
    foreach ($files as $file) { // iterate files
        if (is_file($file)){
            printS( "Delete". $file);
        }
        unlink($file); // delete file
    }
}else{
	printS( " ---- * ---- * ---- * ---- * ----- ");
	printS( " ---- * CONTINUE LAST RUN  * ----- ");
	printS( " ---- * ---- * ---- * ---- * ----- ");
}


$result = selectSQL('SELECT * FROM `sites` WHERE sent_status is null ORDER BY `sites`.`site_id` ASC LIMIT 1');


$id = $domain = $domain = $submit_date = $sent_status = $sent_time = '';

while ($row = mysqli_fetch_assoc($result)) {
    $site_id = $row['site_id'];
    $email = $row['email'];
    $shortForm = $row['short_form_domain']; // TODO this automatic
    $domain = $row['domain'];
    $submit_date = $row['submit_date'];
    $sent_status = $row['sent_status'];
    $sent_time = $row['sent_time'];
}


$global['google'] = "";
$global['google'] = "";
$global['google'] = "";
$global['google'] = "";
$global['google'] = "";


//excuteSQL("DELETE FROM `link` WHERE `link`.`site_id` = $site_id;");

// insert startpage
$sql = "INSERT INTO `link` (`site_id`, `from_link_id`,`name`, `url`, `depth`, `isInternal`) VALUES ('$site_id', '$domain', 'Home', '$domain', '1', '1');";
printS( "". $sql);
excuteSQL($sql);

// http://stackoverflow.com/questions/10108634/crawl-a-website-get-the-links-crawl-the-links-with-php-and-xpath


//printS( "---  ". $mainSQL);

while($Rounds <= $MAXRounds) {
	
	$mainSQL = "SELECT `id`, `site_id`, `name`, `url`, `errorcode`, `isInternal`, `content`, `depth`, `Content-Type`, `start`, `end` FROM `link` WHERE site_id = $site_id and isnull(`errorcode` )";
	$result = selectSQL($mainSQL);

	while ($row = mysqli_fetch_assoc($result)) {

		$NumbersOfScans++;
		printS("");
		printS("");
		printS("NumbersOfScans : ". $NumbersOfScans);

		testThisLink($row, $shortForm, $global);
		if($NumbersOfScans >= $MAXNumbersOfScans ){
			printS("NumbersOfScans: $NumbersOfScans >= MAXNumbersOfScans: $MAXNumbersOfScans" ); 
			exit;
		}
	}
	
	$Rounds++;
	printS( "Rounds : ". $Rounds);
	
	if($Rounds >= $MAXRounds ){
		printS("Rounds: $Rounds >= MAXRounds: $MAXRounds" ); 
		exit;
	}
}



function testThisLink($row, $shortForm, &$global)
{

    $onerun = false;
    try {
        $id = $row['id'];
        $site_id = $row['site_id'];
        $name = $row['name']; // TODO this automatic // bug 123 fix this
        $url = $row['url'];
        $depth = $row['depth'];
        $depth++;

        $errorcode = $row['errorcode'];
        $isInternal = $row['isInternal'];
        $content = $row['content'];
        $SafeContent = makeSafeContent($content);

        $url = removeHttp($url);

        $opts = array('http' =>
            array(
                'method' => 'GET',
				'timeout' => 30, 
                // 'user_agent ' => 'http://404Scanner.com',
				'user_agent ' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)',
                // https://developer.mozilla.org/en-US/docs/Web/HTTP/Content_negotiation/List_of_default_Accept_values
				'header' => array(
                    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*\/*;q=0.8'
					//'application/xml,application/xhtml+xml,text/html;q=0.9, text/plain;q=0.8,image/png,*/*;q=0.5'
                ),
            )
        );
        $context = stream_context_create($opts);

        $now = new DateTime('now');
        //$url = "plus.google.com/117692459050969303006"; $onerun = true;
        printS( "+file_get_contents: ". $url ." isInternal: $isInternal");
        $HTMLData = @file_get_contents("http://". $url, false, $context); // 
        // http://stackoverflow.com/questions/2548451/php-file-get-contents-behaves-differently-to-browser


        $date = new DateTime('now');
        $loadtime = $date->getTimestamp() - $now->getTimestamp();


		if(empty($http_response_header)){
			
			printS(" NO HEADERNO HEADERNO HEADERNO HEADERNO HEADERNO HEADERNO HEADERNO HEADER ");
		}else{
			$parseHeaders = parseHeaders($http_response_header);
			
			if (empty($parseHeaders['reponse_code'])) {
				$parseHeaders['reponse_code'] = "Not set";
			}
			$errorCode = $parseHeaders['reponse_code'];
			$ContentType = $parseHeaders['Content-Type'];
		}

		switch ($errorCode) { // https://en.wikipedia.org/wiki/List_of_HTTP_status_codes

            case '200': // 200 OK - Standard response for successful HTTP requests. The actual response will depend on the request method used. In a GET request, the response will contain an entity corresponding to the requested resource. In a POST request, the response will contain an entity describing or containing the result of the action
                //printS( "200 OK ". $errorCode ."- ". $url);
                //Create a new DOM document
                $dom = new DOMDocument;

                // JUST FOR MAKING THE RIGHT FILE
                $sirName = $url;
                if (cotains($sirName, '?')) {
                    $sirName = explode("?", $sirName);
                    $sirName = $sirName['0'];
                    // printS( "--- sirName 1 ".$sirName . "URL: ". $url);
                }
                $sirName = explode(".", $sirName);
                $sirName = end($sirName);
                $os = array("html", "css", "png", "gif", "jpg", "js", "pdf", "zip", "ppt", "pptx", "doc", "docx", "json");
                if (!in_array($sirName, $os)) {
                    //printS( "---------------------------------------------------------> sirName was '". $sirName . "' URL: '".$url."' SET TO HTML");
                    $sirName = "html";
                } else {
                    //printS( "sirName is NOT CHANGED : ". $sirName );
                }


                $file = './tmp/' . $id . '_' . $name . '.' . $sirName;
                // printS( $file);
                // printS( $shortForm . ' - ' .$HTMLData);
                file_put_contents($file, $HTMLData);

                //Parse the HTML. The @ is used to suppress any parsing errors
                //that will be thrown if the $html string isn't valid XHTML.
                @$dom->loadHTML($HTMLData);

                // FIND THE EMAIL http://www.regexpal.com/96489


                $readyForDatabase = ""; // htmlspecialchars($HTMLData , ENT_QUOTES); // TODO make active
                $sql = "UPDATE `link` SET `errorCode` = $errorCode,  `content` = '$readyForDatabase', `Content-Type` = '$ContentType' , `loadtime` = '$loadtime' WHERE `link`.`id` = $id;";
                //printS( "- ".$sql);
                excuteSQL($sql);

                if ($isInternal == '0') { // stop following
                    //printS( "Do not follow this URL ". $url);
                    return;
                }

				
				
                //Get all links. You could also use any other tag name here,
                //like 'img' or 'table', to extract other tags.
                $links = $dom->getElementsByTagName('*');
                //$links = $dom->getElementsByTagName('a');

                //Iterate over the extracted links and display their URLs
                foreach ($links as $link) {
					
                	

                    //printS($link->nodeValue);
                    //Extract and show the "href"attribute.
                    $newlink = $link->getAttribute('href');

                    if (IsNullOrEmptyString($newlink)) {
                        //printS( "1. IsNullOrEmptyString(href) trying with content ");
                        $newlink = $link->getAttribute('content');
                    }

                    if (IsNullOrEmptyString($newlink)) {
                        //printS( "2. IsNullOrEmptyString(content) trying with src ");
                        $newlink = $link->getAttribute('src');
                    }

                    if (IsNullOrEmptyString($newlink)) {
                        //printS( "2. IsNullOrEmptyString(content) trying with src ");
                        $newlink = $link->getAttribute('rel');
                    }

					/// 
//					$newlink = "i0.wp.com/boolex.com/wp-content/uploads/2015/03/bar-621033_1280.jpg?fit=1280%2C850";

                    if (IsNullOrEmptyString($newlink)) {
                        continue;
                    }

                    $newlink = removeHttp($newlink);

                    if (IsNullOrEmptyString($newlink)) {
                        continue;
                    }

                    if (startsWith($newlink, '/')) {
                        //printS( "- startsWith('//') ". $shortForm . "- ". $newlink);
                        $newlink = $shortForm . $newlink;
                    }

                    // http://www.regextester.com/23
                    $regex = "/([\da-z\.-]+)\.([a-z\.]{2,6})/";
                    if (!(preg_match($regex, $newlink))) {
                        // Indeed, the expression "[a-zA-Z]+ \d+"matches the date string
                        //printS( "------ preg_match NOT A match ".$newlink);
                        continue;
                    }


					
                    if (cotains($newlink, '@') )
					{ // && !(cotains($newlink, 'google.dk'))) {
                        $email = $newlink;
                        printS( "looks like an email ". $email);
                        $email = removeMailTo($email);
                        $email = makeSafeMAILSQL($email);

                        $sql = "INSERT INTO `site_email` (`site_id`, `email`) VALUES ( '$site_id', '$email')";
                        excuteSQL($sql);
                        continue;
                    }

					$isInternal = 0;
					$reason = "";
					
					// IT IS A LINK 
					
                    //printS( "google - ".$global['google'] );
					// LINK TO GOOGLE 
                    if (startsWith($newlink, 'plus.google.com/') && IsNullOrEmptyString($global['google'])) {
                        $sql = "UPDATE `site` SET `google` = '$newlink' WHERE `sites`.`site_id` = $site_id";
                        // $sql = "UPDATE `sites` SET `google` = concat(`google`, '$newlink') WHERE `sites`.`site_id` = $site_id";
                        excuteSQL($sql);
                        $global['google'] = "------------------------------ > GOOGLE DONE ". $newlink;
                        printS( $global['google'] . $sql);
						continue;
                    }

					
					$FirstPartOfURL = $newlink;

					if(strpos($FirstPartOfURL, '/') !== false)
					{
						$FirstPartOfURL = explode('/', $FirstPartOfURL);
						$FirstPartOfURL = $FirstPartOfURL['0'];
					}

					//printS('$FirstPartOfURL :'.$FirstPartOfURL);
					if(!(strpos($FirstPartOfURL, '.') !== false))
					{
						$isInternal = 1;
						$reason = " Dont contain a . ";
					}

					
					// TODO remove / and everything after
					if (cotains($FirstPartOfURL, $shortForm)) 
					{ // if $FirstPartOfURL = "mobil.t3cms.dk/test"
						$isInternal = 1;
						$reason = "cotains URL in URL ";
					}


					
					/*
					if(strpos($newlink, ' ') !== false){
						$newlinkShortForm = explode(' ', $newlink);
						$newlinkShortForm = $newlinkShortForm['0'];
					}
					*/
					
//					printS('$shortForm:'.$shortForm);
					
					/*
                    if (strpos($newlinkShortForm, $shortForm) !== false) {
						$isInternal = 1;
						printS("------------------------------------------------------------------------ newlinkShortForm: $newlinkShortForm : shortForm: $shortForm");
                    } 
					
					// fileadmin/templates/mobil/js/redirect.js
					if (strstr($string, '/')){
							printS(' STEP 1 $isInternal$isInternal$isInternal$isInternal$isInternal$isInternal' );
						$newlinkShortForm = 		explode('/', $newlinkShortForm); // fileadmin  templates mobil/js/redirect.js		
						$newlinkShortForm = $newlinkShortForm[0]; // fileadmin  
						if (!(strpos($newlinkShortForm, '.') !== false)){
							printS(' $isInternal$isInternal$isInternal$isInternal$isInternal$isInternal' );
							$isInternal = 1; // 	
						}
					}
					*/


                    $newName = $link->nodeValue;
                    if (IsNullOrEmptyString($newName)) {
                        $newName = $link->localName;
                    }

                    if (IsNullOrEmptyString($newName)) {
                        printS( "". $newlink);
                        printS( "");
                        print_r($link);
                        print_r($link->childNodes);
                    }

                    $newName = makeSafeName($newName);
                    //$newlink = makeSafeName($newlink);

                    $sql = "INSERT INTO `link` ( `name`, `site_id`, `url`, `from_link_id`, `from_url`  ,`depth`, `isInternal`) VALUES ( '$newName', '$site_id' , '$newlink', '$id', '$url' , $depth , '$isInternal');";

                    $LastId = insertLastId($sql);

					if( $LastId == 0){
						//printS( "---- URL INDEXED ALLREADY : ". $newlink) ;
						continue;
					}

					printS( '---- URL: '. $url . ' isInternal '. $isInternal . ' -> '. $newlink . ' Because ' . $reason ) ;
					
                    if ($LastId == 0) {
                        $sql = "SELECT `id` FROM `link` WHERE `url` = '$newlink' ";
                        $result = selectSQL($sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $LastId = $row['id'];
                        }
                    }

                    $sql = "INSERT INTO `link_link` (`site_id`, `toSite`) VALUES ('$site_id', '$LastId');";
                    $LastId = insertLastId($sql);
                    //printS( "link : link  ". $site_id. "- ". $LastId);

                    if ($isInternal == 1) {
						continue; // is external, so stop searching 
					}

					$keyword = '';
					if (startsWith('/url?q=', $newlink)) { // google match 
						$keyword = 'keyword';
						$newlink = substr($newlink, 7);
					}
					
					//printS "sites link '". $newlink. "'". "Name:". $newName;
					$sql = 'INSERT INTO `sites` (domain) VALUES ("' . $newlink . '")';
					printS("---- URL: ". $url . "isInternal ". $isInternal . "-> ". $newlink) ;
					excuteSQL($sql);
                }
                break;

            case '301': // The HTTP response status code 301 Moved Permanently is used for permanent URL redirection,
            case '302': // Found
            case '400': // Bad Request
            case '401': // 401 Unauthorized (RFC 7235)
            case '402': // Payment Required
            case '403': // Forbidden
            case '404': // Not Found
            case '405': // Method Not Allowed
            case '406': // Not Acceptable
            case '407': // Proxy Authentication Required (RFC 7235)
            case '408': // Request Timeout
            case '408': // Request Timeout
            case '409': // Conflict
            case '410': // Gone
            case '411': // Length Required
            case '412': // Precondition Failed (RFC 7232)
            case '413': // Payload Too Large (RFC 7231)
            case '414': // URI Too Long (RFC 7231)
            case '415': // Unsupported Media Type
            case '416': // Range Not Satisfiable (RFC 7233)
            case '417': // Expectation Failed
            case '418': // I'm a teapot (RFC 2324)
            case '421': // Misdirected Request (RFC 7540)
            case '422': // Unprocessable Entity (WebDAV; RFC 4918)
            case '423': // Locked (WebDAV; RFC 4918)
            case '424': // Failed Dependency (WebDAV; RFC 4918)
            case '426': // Upgrade Required
            case '428': // Precondition Required (RFC 6585)
            case '431': // Request Header Fields Too Large (RFC 6585)
            case '451': // Unavailable For Legal Reasons (RFC 7725)
            case '520': // Unknown Error
                excuteSQL("UPDATE `link` SET `errorcode` = '$errorCode' ,  `loadtime` = '$loadtime' ,  `loadtime` = '$loadtime' WHERE `link`.`id` = $id");
                //code to be executed if n=label1;
                return;

            case '999': // Linkedin error ?
                excuteSQL("UPDATE `link` SET `errorcode` = '$errorCode' ,  `loadtime` = '$loadtime' ,`content` = '$SafeContent' , `loadtime` = '$loadtime' WHERE `link`.`id` = $id");
                //code to be executed if n=label1;
                return;

            case '429': // oo Many Requests (RFC 6585)
                printS( "'429': oo Many Requests (RFC 6585) ");
                sleep(60); // sleep for 60 seconds
                return;


            default:
                $log = "Hello default ". $errorCode . "URL : ". $url;
                printS( $log);
                excuteSQL("UPDATE `link` SET `errorcode` = '404' ,  `loadtime` = '$loadtime' ,  `loadtime` = '$loadtime' WHERE `link`.`id` = $id");

                //code to be executed if n is different from all labels;
                break;
        }
    } catch (Exception $e) {
        printS( "Exception               ");

        //     printS( "Everything went better than expected");
        //    printS( $e->getMessage();
    }

    if ($onerun) {
        printS( "Ended successfull - onerun ");
        exit;
    }

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
  <meta name="generator"content=
  "HTML Tidy for Windows (vers 25 March 2009), see www.w3.org">

  <title></title>
</head>

<body>
</body>
</html>
