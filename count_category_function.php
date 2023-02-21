<?php namespace ProcessWire;
// Bootstrap ProcessWire
//include_once('../index.php');
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//################################################################
// only for superuser
function updateCategories(){
	
$user=wire("user");

if (!$user->isSuperuser()){
	echo"<p>Zugriff verweigert!</p>";
	exit();
}
// Assign API variables to make things a little easier
$page=wire('page');
$pages=wire('pages');
$fields = wire("fields");
$templates = wire("templates");
$modules = wire("modules");
$templates= wire("templates");
$fieldgroups= wire("fieldgroups");
$modules= wire("modules");

//################################################################
//echo'<p>Update Anzahl der Produkte in den Kategorien.</p>';

//level 2 Möbel A-Z - level 2 Räume
$m_level2=$pages->get(1050)->children;
$r_level2=$pages->get(1051)->children;

//Möbel A-Z
foreach($m_level2 as $l2){
	$c_top=0;
	$c_aus=0;
	$c_top=$pages->count("template=produkt,pro_kategorie_parent=$l2->id,pro_ausstellung!=1");
	$c_aus=$pages->count("template=produkt,pro_kategorie_parent=$l2->id,pro_ausstellung=1");
	//save counter l2
	$l2->of(false);
	$l2->counter_topangebote=$c_top;
	$l2->counter_ausstellung=$c_aus;
	$pages->save($l2);
	foreach($l2->children as $l3){
		$c_top=0;
		$c_aus=0;
		$c_top=$pages->count("template=produkt,pro_kategorie=$l3->id,pro_ausstellung!=1");
		$c_aus=$pages->count("template=produkt,pro_kategorie=$l3->id,pro_ausstellung=1");
		//save counter l3
		$l3->of(false);
		$l3->counter_topangebote=$c_top;
		$l3->counter_ausstellung=$c_aus;
		$pages->save($l3);
	}
}
//Räume
foreach($r_level2 as $l2){
	$c_top=0;
	$c_aus=0;
	$c_top=$pages->count("template=produkt,pro_raeume_parent=$l2->id,pro_ausstellung!=1");
	$c_aus=$pages->count("template=produkt,pro_raeume_parent=$l2->id,pro_ausstellung=1");
	//save counter l2
	$l2->of(false);
	$l2->counter_topangebote=$c_top;
	$l2->counter_ausstellung=$c_aus;
	$pages->save($l2);
	foreach($l2->children as $l3){
		$c_top=0;
		$c_aus=0;
		$c_top=$pages->count("template=produkt,pro_raeume=$l3->id,pro_ausstellung!=1");
		$c_aus=$pages->count("template=produkt,pro_raeume=$l3->id,pro_ausstellung=1");
		//save counter l3
		$l3->of(false);
		$l3->counter_topangebote=$c_top;
		$l3->counter_ausstellung=$c_aus;
		$pages->save($l3);
	}
}
$out='<p>Done</p>';
return $out;
}
