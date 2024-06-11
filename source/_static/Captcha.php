<?php
/*
                                                    _                                  _             __      
                                                   | |                                (_)           / _|     
  _ __   __ _ ___ ___  ___ _   _ _ __ ___ ______ __| | ___ ______ ___  __ ___   _____  _ _ __ ___  | |_ _ __ 
 | '_ \ / _` / __/ __|/ _ \ | | | '__/ __|______/ _` |/ _ \______/ __|/ _` \ \ / / _ \| | '__/ __| |  _| '__|
 | |_) | (_| \__ \__ \  __/ |_| | |  \__ \     | (_| |  __/      \__ \ (_| |\ V / (_) | | |  \__ \_| | | |   
 | .__/ \__,_|___/___/\___|\__,_|_|  |___/      \__,_|\___|      |___/\__,_| \_/ \___/|_|_|  |___(_)_| |_|   
 | |                                                                                                         
 |_|                                                                                                         

pds_captcha.php - un captcha mathématique
bidouillé par passeurs de savoirs<br>
plus d'infos sur 
http://passeurs-de-savoirs.fr/lab/lab2015/captcha-math.php
*/
function pdscaptcha($etape){
if ($etape=="question")
{
$messageinfos="Pour des raisons de sécurité, et et éviter le spam, merci de résoudre l'opération suivante :";
$tchiffres=array(0,1,2,3,4,5,6,7,8,9,10,12);
$tlettres=array("zéro","un","deux","trois","quatre","cinq","six","sept","huit","neuf","dix","onze","douze");
$premier=rand ( 0 , count($tchiffres)-1 );
$second=rand ( 0 , count($tchiffres)-1 );
$choixsigne=rand ( 0 ,1 );
if($second<=$premier && $choixsigne==1 )
{
	$resultat=md5($tchiffres[$premier]-$tchiffres[$second]);
	$operation="combien font ".$tlettres[$premier]." retranché de ".$tlettres[$second]." ?";
}
else if($second<=$premier && $choixsigne==0 )
{
	$resultat=md5($tchiffres[$premier]-$tchiffres[$second]);
	$operation="combien font ".$tlettres[$premier]." moins ".$tlettres[$second]." ?";
}
else if ($second>$premier && $choixsigne==1 )
{
	$resultat=md5($tchiffres[$premier]+$tchiffres[$second]);
	$operation="combien font ".$tlettres[$premier]." ajouté à ".$tlettres[$second]." ?";
	
}
else
{
	$resultat=md5($tchiffres[$premier]+$tchiffres[$second]);
	$operation="combien font ".$tlettres[$premier]." plus ".$tlettres[$second]." ?";
	
}
$o="";
foreach (str_split(utf8_decode($operation)) as $obj) {
	$o .= "&#".ord($obj).";";
}
    



$champquestion="<p>
<label for=\"reponsecap\">".$messageinfos."<br>\n<br /><u>".$o."</u> <em>(en chiffres)</em>&nbsp;</label>\n<input type=\"text\" name=\"reponsecap\" value=\"\" />\n<input name=\"reponsecapcode\" type=\"hidden\" value=\"".$resultat."\" /></p>";
return $champquestion;
}
else
{
if (md5(htmlspecialchars($etape["reponsecap"]))==htmlspecialchars($etape["reponsecapcode"]))
{ return true;}
else
{return false;}
}

}

?>