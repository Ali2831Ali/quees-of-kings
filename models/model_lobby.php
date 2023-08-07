<?php

class model_lobby extends Model
{

    function __construct()
    {
        parent::__construct();
        Model::sessionInit();
    }
    function charge(){
        $csrf=Model::findUser();
        $sql='select * from tbl_user where csrf=?';
        $result=$this->doSelect($sql,[$csrf],1);
        $old=$result['time'];
        $now=time();
        if ($now-$old > 24*60*60){
            $sql = 'update tbl_user set charge=?,time=? where csrf=?';
            $this->doQuary($sql, [100,$now, $csrf]);
        }
        //date_default_timezone_set('Asia/Tehran');
        //$today_date = self::jaliliDate('Y-m-d H:i:s');
    }
    function getUserInfo(){
        $csrf=Model::findUser();
        $sql='select * from tbl_user where csrf=?';
        $result=$this->doSelect($sql,[$csrf],1);
        if ($result['charge'] >100){
            $sql = 'update tbl_user set charge=? where csrf=?';
            $this->doQuary($sql, [100, $csrf]);
            $result['charge']=100;
        }





        $sql2='select * from tbl_ques where csrf=?';
        $result2=$this->doSelect($sql2,[$csrf]);
        $num=count($result2);
        $result['ques']=$num;
        $sql3='select * from tbl_user ORDER BY coin DESC';
        $result3=$this->doSelect($sql3);

        $i=1;
        foreach ($result3 as $row){
            if ($row['csrf']==$result['csrf']){
                $result['rank']=$i;
            }
            $i++;
        }
        return $result;
    }
    function getRank(){
        $sql='select * from tbl_user ORDER BY coin DESC';
        $result=$this->doSelect($sql);
        $csrf=Model::findUser();
        $sql2='select * from tbl_user where csrf=?';
        $result2=$this->doSelect($sql2,[$csrf],1);
        $rank=[];
        foreach ($result as $key=>$row){
            if ($row['id']==$result2['id']){
                $ok='ok';
            }else{
                $ok='no';
            }
            if (count($rank)==10){

            }else{
                $array=['coin'=>$row['coin'],'name'=>$row['name'],'ok'=>$ok];
                array_push($rank,$array);
            }
        }
        return $rank;
    }

    function logOut()
    {
        $user = Model::findUser();
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
            unset($_SESSION['pass']);
            header('location:' . URL . 'index');
        } else if (isset($_COOKIE['userId'])) {
            $time = time() - (8 * 24 * 60 * 60);
            setcookie('userId', '', $time,'/quees');
            setcookie('pass', '', $time,'/quees');
            header('location:' . URL . 'index');
        }

    }






    function updateuser($data)
    {

        $name = $data['name'];
        $email = $data['email'];
        $oldEmail=$data['oldEmail'];
        $oldpass = $data['oldpass'];
        $pass_set=md5($oldpass.'SUPER_CODE'.$oldEmail);
        $newpass = $data['newpass'];
        $renewpass = $data['renewpass'];

        if (isset($_SESSION['pass'])){
            $de=base64_decode($_SESSION['pass']);
        }else if (isset($_COOKIE['pass'])){
            $de=base64_decode($_COOKIE['pass']);
        }else{
            header('location:' . URL . 'login');
        }

        $userInfo = $this->getUserInfo();
        $error = '';
        $sql = "select * from tbl_user where email=? AND email!=?";
        $result = $this->doSelect($sql, [$email, $userInfo['email']]);

        if (empty($email)) {
            $error = 'لطفا فیلد ایمیل را پر کنید.';
        } else {
            if (sizeof($result) > 0) {
                $error = 'این ایمیل قبلا انتخاب شده است.';
            } else {
                if (empty($oldpass) and empty($newpass) and empty($renewpass)) {

                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


                        $csrf=md5($de.'SUPER_CODE'.$email);
                        $code=Model::findUser();
                                        $sql = "update tbl_user set name=?,email=?,csrf=? where id=?";
                                        $this->doQuary($sql, [$name, $email,$csrf, $userInfo['id']]);
                                        $sql="update tbl_ques set csrf=? where csrf=?";
                                        $this->doQuary($sql,[$csrf,$code]);


                        if (isset($_SESSION['userId'])) {
                            unset($_SESSION['userId']);
                            Model::sessionInit();
                            Model::sessionSet('userId',$csrf);
                            header('location:' . URL . 'index');
                        }
                        if (isset($_COOKIE['userId'])) {
                            $time = time() - (8 * 24 * 60 * 60);
                            setcookie('userId', '', $time, '/quees');
                            setcookie('userId', $csrf, time() + 7 * 24 * 60 * 60,'/');
                            header('location:' . URL . 'index');
                        }





                    } else {
                        $error = 'ایمیل وارد شده معتبر نمیباشد.';
                    }
                } else {
                    if ($pass_set == $userInfo['csrf']) {
                        $length = strlen($newpass);
                        if ($length >= 8) {
                            if (!preg_match('/[ا-ی]/', $newpass) and !preg_match('/[ ]/', $newpass)) {
                                if (preg_match('/[0-9]+/', $newpass) and preg_match('/[a-z]+/', $newpass) and preg_match('/[^da-z]/', $newpass) and preg_match('/\d/', $newpass)) {
                                    if ($newpass == $renewpass) {
                                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                                            $pass_set1=md5($newpass.'SUPER_CODE'.$email);
                                                            $en=base64_encode($newpass);
                                                            if (isset($_SESSION['userId'])) {
                                                                unset($_SESSION['userId']);
                                                                unset($_SESSION['pass']);
                                                                Model::sessionInit();
                                                                Model::sessionSet('userId',$pass_set1);
                                                                Model::sessionSet('pass',$en);
                                                                header('location:' . URL . 'index');
                                                            } else if (isset($_COOKIE['userId'])) {
                                                                $time = time() - (8 * 24 * 60 * 60);
                                                                setcookie('userId', '', $time, '/');
                                                                setcookie('pass', '', $time, '/');
                                                                $time = time() + (8 * 24 * 60 * 60);
                                                                setcookie('userId', $pass_set1, time() + 7 * 24 * 60 * 60,'/');
                                                                setcookie('pass', $en, time() + 7 * 24 * 60 * 60,'/');
                                                                header('location:' . URL . 'index');
                                                            }


                                                            $sql5='update tbl_user set csrf=? where id=?';
                                                            $this->doQuary($sql5,[$pass_set1,$userInfo['id']]);

                                                            $sql = "update tbl_user set name=?,email=?,csrf=? where id=?";
                                                            $this->doQuary($sql, [$name, $email,$pass_set1, $userInfo['id']]);
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
                    } else {
                        $error = 'پسورد قبلی وارد شده درست نمیباشد.';
                    }
                }
            }

        }

        if (!empty($error)) {
            header('location:' . URL . 'lobby?error=' . $error);
        } else {


            header('location:' . URL . 'lobby');
        }
    }



}
?>