<?php

class model_admin extends Model
{
    function __construct()
    {
        parent::__construct();
        Model::sessionInit();
    }

    function getUserInfo()
    {
        $sql = "select * from tbl_user where status=?";
        $result = $this->doSelect($sql, [0]);
        return $result;
    }

    function getquesInfo()
    {
        $sql = "select * from tbl_ques ORDER BY status asc ";
        $result = $this->doSelect($sql);

        $sql2 = 'select * from tbl_category';
        $result2 = $this->doSelect($sql2);
        foreach ($result as $key => $row) {
            foreach ($result2 as $row2) {
                if ($row['category'] == $row2['id']) {
                    $result[$key]['game'] = $row2['title'];
                }
            }
        }

        $entezar = [];
        $rad = [];
        $taiid = [];
        $tedad = count($result);
        foreach ($result as $row) {

            $stat = $row['status'];
            if ($stat == 0) {
                array_push($entezar, 1);
            } else if ($stat == 1) {
                array_push($taiid, 1);
            } else if ($stat == 2) {
                array_push($rad, 1);
            }
        }
        $entezar = array_sum($entezar);
        $taiid = array_sum($taiid);
        $rad = array_sum($rad);


        $sql3 = 'select * from tbl_user';
        $result3 = $this->doSelect($sql3);
        $ids = [];
        foreach ($result3 as $row) {
            $im = explode(',', $row['ques_id']);
            $ok = array_merge_recursive($ids, $im);
            $ids = $ok;
        }
        $n = array_count_values($ids);
        foreach ($result as $key => $row) {
            $id = $row['id'];
            if (isset($n[$id])) {
                $num = $n[$id];
            } else {
                $num = 0;
            }
            $result[$key]['num'] = $num;
        }


        return ['soal' => $result, 'taiid' => $taiid, 'entezar' => $entezar, 'rad' => $rad, 'tedad' => $tedad];
    }


    function getcat()
    {
        $sql = 'select * from tbl_category';
        $result = $this->doSelect($sql);
        return $result;
    }


    function delQues($id)
    {
        $sql = "delete from tbl_ques where id=?";
        $this->doQuary($sql, [$id]);
        $ok = $this->getquesInfo();
        unset($ok['soal']);
        return $ok;
    }

    function show($id)
    {
        $sql = 'select * from tbl_ques where id=?';
        $result = $this->doSelect($sql, [$id], 1);
        $un = unserialize($result['answer']);
        $result['answer'] = $un;

        return $result;
    }

    function edit($id)
    {
        $sql = 'select * from tbl_ques where id=?';
        $result = $this->doSelect($sql, [$id], 1);
        $un = unserialize($result['answer']);
        $result['answer'] = $un;

        return $result;
    }

    function editQues($title, $dorost, $ans, $id, $mozo, $coin, $vaziat)
    {
        $ans = explode(',', $ans);
        $ok = [1 => ['title' => $ans[0], 'status' => 'g_false', 'id' => 1], 2 => ['title' => $ans[1], 'status' => 'g_false', 'id' => 2], 3 => ['title' => $ans[2], 'status' => 'g_true', 'id' => 3], 4 => ['title' => $ans[3], 'status' => 'g_false', 'id' => 4]];
        foreach ($ok as $key => $row) {
            if ($dorost == $key) {
                $ok[$key]['status'] = 'g_true';
            } else {
                $ok[$key]['status'] = 'g_false';
            }
        }
        $ok = serialize($ok);
        $sql3 = 'update tbl_ques set text=?,answer=?,category=?,status=?,coin=? where id=? ORDER BY status desc';
        $this->doQuary($sql3, [$title, $ok, $mozo, $vaziat, $coin, $id]);
        return '';

    }

    function afzodan($title,$dorost,$ans,$id,$emtiaz){
        $csrf=Model::findUser();
        $ans=explode(',',$ans);
        $ok= [1=>['title'=>$ans[0],'status'=>'g_false','id'=>1],2=>['title'=>$ans[1],'status'=>'g_false','id'=>2],3=>['title'=>$ans[2],'status'=>'g_true','id'=>3],4=>['title'=>$ans[3],'status'=>'g_false','id'=>4]];
        foreach ($ok as $key=> $row){
            if ($dorost==$key){
                $ok[$key]['status']='g_true';
            }else{
                $ok[$key]['status']='g_false';
            }
        }
        $ok=serialize($ok);
        $sql = "insert into tbl_ques (category,text,csrf,status,answer,coin) VALUES (?,?,?,?,?,?)";
        $this->doQuary($sql, [$id,$title,$csrf,1,$ok,$emtiaz]);
        return '';
    }

    function dofilter($filter,$select){
        if ($select=='set') {
            if ($filter == 3) {
                $sql = "select * from tbl_ques  ORDER BY status asc ";
                $result = $this->doSelect($sql);
            } else {
                $sql = "select * from tbl_ques where status=? ";
                $result = $this->doSelect($sql, [$filter]);
            }
        }else{
            if ($filter == 3) {
                $sql = "select * from tbl_ques where category=? ORDER BY status asc ";
                $result = $this->doSelect($sql, [$select]);
            } else {
                $sql = "select * from tbl_ques where status=? and category=?";
                $result = $this->doSelect($sql, [$filter, $select]);
            }
        }

        return $result;

    }

    function avatar(){
        $sql='select * from tbl_avatar';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getadminInfo(){
        $sql="select * from tbl_admin";
        $result=$this->doSelect($sql);
        $tedad = count($result);


        return ['admin' => $result, 'tedad' => $tedad];
    }

    function delAdmin($id)
    {
        $sql = "delete from tbl_admin where id=?";
        $this->doQuary($sql, [$id]);
        $ok = $this->getadminInfo();
        unset($ok['admin']);
        return $ok;
    }

    function sabt_admin($name,$email,$password,$repassword)
    {
        $sql = "select * from tbl_user where email=?";
        $result = $this->doSelect($sql, [$email]);

        if (empty($name) or empty($password) or empty($repassword) or empty($email)) {
            $error = 'لطفا تمام فیلد ها را پر کنید.';
        } else {
            if (sizeof($result) > 0) {
                $error = 'این ایمیل قبلا انتخاب شده است.';
            } else {

                $length = strlen($password);
                if ($length >= 8) {
                    if (!preg_match('/[ا-ی]/', $password) and !preg_match('/[ ]/', $password)) {
                        if (preg_match('/[0-9]+/', $password) and preg_match('/[a-z]+/', $password) and preg_match('/[^da-z]/', $password) and preg_match('/\d/', $password)) {

                            if ($password == $repassword) {
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                    $sql="insert into tbl_admin (name,email,csrf) VALUES (?,?,?)";
                                    $this->doQuary($sql, [$name,$email,$password]);

                                } else {
                                    $error = 'ایمیل وارد شده معتبر نمیباشد.';
                                }
                            } else {
                                $error = 'رمز عبور با تایید رمز عبور یکسان نیست.';
                            }

                        } else {
                            $error = 'لطفا پسورد خود را قوی تر کنید (a-z,0-9).';
                        }
                    } else {
                        $error = 'فقط حروف اینگلیسی و اعداد مجاز است.';
                    }
                } else {
                    $error = 'برای رمز عبور حداقل باید 8 نویسه داشته باشید.';
                }
            }

        }

        if (!empty($error)) {
          print_r($error);
        } else {

            return 'ok';
        }



    }

}

?>
