<?php

class model_recent extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getUserInfo(){
        $csrf=Model::findUser();
        $sql='select * from tbl_online where csrf=?';
        $result=$this->doSelect($sql,[$csrf]);

        $sql1 = 'select * from tbl_category';
        $result1 = $this->doSelect($sql1);

        $sql2='select * from tbl_online where csrf!=?';
        $result2=$this->doSelect($sql2,[$csrf]);

        $sql4='select * from tbl_user ';
        $result4=$this->doSelect($sql4);


        foreach ($result as $key=>$row) {
            foreach ($result1 as $row1){
                if ($row['category']==$row1['id']){
                    $result[$key]['category']=$row1['title'];
                }
            }
            foreach ($result2 as $row2){
                if ($row2['game']==$row['game']){
                    foreach ($result4 as $row4){
                        if ($row4['csrf']==$row2['csrf']){
                            $result[$key]['harif']=$row4['name'];
                        }
                    }
                }
            }
        }





        return $result;




    }
    function show($id){
        $sql='select * from tbl_ques where id=?';
        $result=$this->doSelect($sql,[$id],1);
        $un=unserialize($result['answer']);
        $result['answer']=$un;

        return $result;
    }

}

?>