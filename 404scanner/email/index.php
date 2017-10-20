<?php
include("../db.php");

$site_id = 2;

	$mainSQL = "SELECT `domain` FROM `sites` WHERE site_id = $site_id LIMIT 1";
	$result = selectSQL($mainSQL);
	$id = $domain = $submit_date = $sent_status = $sent_time = '';
	while ($row = mysqli_fetch_assoc($result) ) {
   		$domain = $row['domain'];
	}
							
	$mainSQL = "SELECT `domain` FROM `sites` WHERE site_id = $site_id LIMIT 1";
	$result = selectSQL($mainSQL);
	$id = $domain = $submit_date = $sent_status = $sent_time = '';
	while ($row = mysqli_fetch_assoc($result) ) {
		$domain = $row['domain'];
	}




?>


<h1> SUBJECT : <?php echo $domain; ?> has  </h1>

<br> <br> <br> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!-- If you delete this meta tag, the ground will open and swallow you. -->
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ZURBemails</title>
	
<link rel="stylesheet" type="text/css" href="stylesheets/email.css" >

</head>
 
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#999999">
	<tr>
		<td></td>
		<td class="header container" align="">
			
			<!-- /content -->
			<div class="content">
				<table bgcolor="#999999" >
					<tr>
						<td><img src="http://placehold.it/200x50/" /></td>
						<td align="right"><h6 class="collapse">Newsletter</h6></td>
					</tr>
				</table>
			</div><!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->

<!-- BODY -->
<table class="body-wrap" bgcolor="">
	<tr>
		<td></td>
		<td class="container" align="" bgcolor="#FFFFFF">
			
			<!-- content -->
			<div class="content">
				<table>
					<tr>
						<td>
							


							<h1><?php echo $domain; ?></h1>
							<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
							
							<!-- A Real Hero (and a real human being) -->
							<p><img src="http://placehold.it/600x300" /></p><!-- /hero -->
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						</td>
					</tr>
				</table>
			</div><!-- /content -->
			
			<!-- content -->
			<div class="content">
				
				<table bgcolor="">
					<tr>
						<td class="small" width="20%" style="vertical-align: top; padding-right:10px;"><img src="http://placehold.it/75x75" /></td>
						<td>
							<h4>Title Ipsum <small>This is a note.</small></h4>
							<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<a class="btn">Clickity Click &raquo;</a>
						</td>
					</tr>
				</table>
			
			</div><!-- /content -->
			
			<!-- content -->
			<div class="content"><table bgcolor="">
				<tr>
					<td class="small" width="20%" style="vertical-align: top; padding-right:10px;"><img src="http://placehold.it/75x75" /></td>
					<td>
						<h4>200 <small>This is a note.</small></h4>
						<p class="">
						
						<?php

							$mainSQL = "SELECT `id`, `site_id`, `name`, `from_url`, `url`, `errorcode`, `isInternal`, `content`, `depth`, `Content-Type`, `start`, `end` 
							FROM `link` WHERE 
							 
							`errorcode` != '200' AND 
							`errorcode` != '406' ";
							$result = selectSQL($mainSQL);
							//echo "\n ---  " .$mainSQL;

							$id = $domain = $domain = $submit_date = $sent_status = $sent_time = '';

							while ($row = mysqli_fetch_assoc($result) ) {
						   		$id = $row['id'];
								$from_url = $row['from_url'];
								$name = $row['name']; // TODO this automatic // bug 123 fix this 
								$url = $row['url'];
								$errorcode = $row['errorcode'];

								echo "<br> <a href='http://" .$from_url."' target='_blank'>$name</a> " . " LINKING TO <a href='http://" .$url."' target='_blank'>$url</a>". " With error " . $errorcode ;

							}


						?> 

						</p>
						<a class="btn">Clickity Click &raquo;</a>
					</td>
				</tr>
			</table></div><!-- /content -->
			
			<!-- content -->
			<div class="content"><table bgcolor="">
				<tr>
					<td>
						
						<!-- Callout Panel -->
						<p class="callout">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt. <a href="#">Do it Now! &raquo;</a>	</p><!-- /callout panel -->
						
					</td>
				</tr>
			</table></div><!-- /content -->
			
			<!-- content -->
			<div class="content"><table bgcolor="">
				<tr>
					<td class="small" width="20%" style="vertical-align: top; padding-right:10px;"><img src="http://placehold.it/75x75" /></td>
					<td>
						<h4>Title Ipsum <small>This is a note.</small></h4>
						<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<a class="btn">Clickity Click &raquo;</a>
					</td>
				</tr>
			</table></div><!-- /content -->
			
			<!-- content -->
			<div class="content"><table bgcolor="">
				<tr>
					<td class="small" width="20%" style="vertical-align: top; padding-right:10px;"><img src="http://placehold.it/75x75" /></td>
					<td>
						<h4>Title Ipsum <small>This is a note.</small></h4>
						<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<a class="btn">Clickity Click &raquo;</a>
				
					</td>
				</tr>
			</table></div><!-- /content -->
			
			<!-- content -->
			<div class="content">
				<table bgcolor="">
					<tr>
						<td>
							
							<!-- social & contact -->
							<table bgcolor="" class="social" width="100%">
								<tr>
									<td>
										
										<!--- column 1 -->
										<div class="column">
											<table bgcolor="" cellpadding="" align="left">
										<tr>
											<td>				
												
												<h5 class="">Connect with Us:</h5>
												<p class=""><a href="#" class="soc-btn fb">Facebook</a> <a href="#" class="soc-btn tw">Twitter</a> <a href="#" class="soc-btn gp">Google+</a></p>
						
												
											</td>
										</tr>
									</table><!-- /column 1 -->
										</div>
										
										<!--- column 2 -->
										<div class="column">
											<table bgcolor="" cellpadding="" align="left">
										<tr>
											<td>				
																			
												<h5 class="">Contact Info:</h5>												
												<p>Phone: <strong>408.341.0600</strong><br/>
                Email: <strong><a href="emailto:hseldon@trantor.com">hseldon@trantor.com</a></strong></p>
                
											</td>
										</tr>
									</table><!-- /column 2 -->	
										</div>
										
										<div class="clear"></div>
	
									</td>
								</tr>
							</table><!-- /social & contact -->
							
						</td>
					</tr>
				</table>
			</div><!-- /content -->
			

		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
			
				<!-- content -->
				<div class="content">
					<table>
						<tr>
							<td align="center">
								<p>
									<a href="#">Terms</a> |
									<a href="#">Privacy</a> |
									<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
								</p>
							</td>
						</tr>
					</table>
				</div><!-- /content -->
				
		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>