<?php
header('Content-Type:text/html;charset=GB2312');
function get_rand($proArr) {     
    $result = '';     
   $proSum = array_sum($proArr);    
    foreach ($proArr as $key =>$proCur) {        
    $randNum = mt_rand(1, $proSum);         
    if ($randNum <= $proCur) {            
    $result = $key;             
    break;         
    } else { 
       
    $proSum -= $proCur;         
    }     
    }     
    unset ($proArr);     
    return $result; 
    } 
       
       
    $prize_arr = array(
    '0' => array('id'=>1,'prize'=>'平板电脑','v'=>1),
    '1' => array('id'=>2,'prize'=>'数码相机','v'=>5),
    '2' => array('id'=>3,'prize'=>'音箱设备','v'=>10),
    '3' => array('id'=>4,'prize'=>'4G优盘','v'=>12),
    '4' => array('id'=>5,'prize'=>'10Q币','v'=>22),
    '5' => array('id'=>6,'prize'=>'下次没准就能中哦','v'=>5000), ); 
       
       
    foreach ($prize_arr as $key => $val) {
        $arr[$val['id']] = $val['v']; 
    } 
    $rid = get_rand($arr); 
    //根据概率获取奖项id
    $res['yes'] = $prize_arr[$rid-1]['prize']; //中奖项 
    unset($prize_arr[$rid-1]); //将中奖项从数组中剔除，剩下未中奖项 
    shuffle($prize_arr); //打乱数组顺序 
    for($i=0;$i<count($prize_arr);$i++){     
        $pr[] = $prize_arr[$i]['prize']; 
        } 
    $res['no'] = $pr;   
    // 除了中奖外的其他数据
    print_r($res);