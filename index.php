<?php
require_once('simple_html_dom.php');
// 新建一个Dom实例
$html = new simple_html_dom();
// 从url中加载

$str='';
for($i=1;$i<=5;$i++){
    $html->load_file('http://www.kuaidaili.com/free/inha/'.$i);
    $as = $html->find('tr td');
    foreach($as as $k=>$v){
        if($k%7==0){
            $str.='http://'.$v->plaintext;
            $str.=':'.$as[$k+1]->plaintext."/\r\n";
        }
    }
    usleep(10000000);
}


$myfile = fopen("result.txt", "w");
fwrite($myfile, $str);
fclose($myfile);


