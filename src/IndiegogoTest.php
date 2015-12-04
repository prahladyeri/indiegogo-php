<?php
/*
 * @author: Prahlad Yeri
 * @title: Indiegogo library test client
* @version: 1.3
 * */
 
require_once('Indiegogo.php');
use Indiegogo\Loader; 

$data = Loader::indie_get_comments('e88bd0a00305bfdfb18003a75665643b');
echo $data->count . " comments fetched!\n";
/*foreach($data->response as $comment){
	echo $comment->id, $comment->created_at, $comment->text,"\n";
	echo "\n";
}*/

$data =  Loader::indie_get_contributions('e88bd0a00305bfdfb18003a75665643b');
echo $data->count . " contributions fetched!\n";
foreach($data->response as $contrib){
	echo $contrib->id, $contrib->created_at, $contrib->amount, $contrib->by,"\n";
}

/*Now lets put the contribs into a CSV*/
$fp = fopen('contrib.csv', 'w');
$hrow = array('ID', 'Created_at', 'Amount', 'By', 'Avatar_url');
fputcsv($fp, $hrow);
foreach($data->response as $contrib) {
	$row = array($contrib->id, $contrib->created_at, $contrib->amount, $contrib->by, $contrib->avatar_url);
	fputcsv($fp, $row);
}
fclose($fp);
echo "I've written fetched contribs to contrib.csv.\n";

?>
