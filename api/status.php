<?php
$platform = $_GET['platform'];
$configRoot = '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR ;
include_once( $configRoot . 'http_client.php');
switch($platform){
	case 'discuz':
		include_once($configRoot . 'discuz.php');
		break;
	case 'uchome':
		include_once($configRoot . 'uchome.php');
		break;
}

$ticket = gp('ticket');
if(!empty($ticket)){
        $data = array('ticket'=>$ticket,'domain'=>$_IMC['domain'],'apikey'=>$_IMC['apikey'],'to'=>gp('to'),'nick'=>to_unicode(to_utf8(nick($space))),'from'=>$space['uid'],'show'=>gp('show'));
	//Logout webim server.
	$client = new HttpClient($_IMC['imsvr'], $_IMC['impost']);
	$client->post('/statuses',$data);
$pageContents = $client->getContent();
	echo $pageContents;
}
?>
