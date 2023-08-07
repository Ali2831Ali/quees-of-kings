<?php

$n = readline();

$n=1;//-------------------------------------------------------------------------------------------------------------------------------
$final=[];
for ($o=1;$o<=$n;$o++){


    $first=readline();
    $first='5 1';//--------------------------------------------------------------------------------------------------------------------
    $ex=explode(' ',$first);

    $arr=[];
    for ($i=1;$i<=$ex[1];$i++){
        $ok=readline();
        $ok='3 0';//-------------------------------------------------------------------------------------------------------------------
        $th='2 1';//-------------------------------------------------------------------------------------------------------------------
        $oo='4 0';//-------------------------------------------------------------------------------------------------------------------
        $ok=explode(' ',$ok);
        $th=explode(' ',$th);
        $oo=explode(' ',$oo);
        array_push($arr,$ok);
        array_push($arr,$th);
        array_push($arr,$oo);
    }
    array_push($final,['title'=>$ex,'description'=>$arr]);
}


foreach ($final as $key2=> $row){
    $desc=$row['description'];
    foreach ($desc as $key => $row2){
        if (!isset($final[$key2]['stat'])){
            $now=$row2[0];
            $last=0;
            if (isset($desc[$key+1])){
                $last=$desc[$key+1][0];
            }
            if ($last==0){
                $final[$key2]['stat']='no';
            }else{
                $p=$row2[1];
                $q=$desc[$key+1][1];
                if ($now==$last-1){
                    if ($p==$q){
                        $final[$key2]['stat']='yes';
                    }else{
                        $final[$key2]['stat']='no';
                    }
                }
            }
        }
    }
}
foreach ($final as $row){
    echo $row['stat'].'<br>';
}



?>