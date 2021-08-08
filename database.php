<?php

class DataBase{

    public $db_server='localhost';
    public $db_name='db_test';
    public $db_user='root';
    public $db_password='';
    public $connection;


    public function conn_pdo()
    {
        try{
            $this->connection = new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function connect_db()
    {
        $this->connection=new mysqli($this->db_server,$this->db_user,$this->db_password,$this->db_name);
        if ($this->connection->connect_error)
        {
            echo 'error database this error :'.$this->connection->connect_error;
        }


    }

    public function close_connect()
    {
        $this->connection->close();
    }

    public function table_exist($table,$create)
    {
        $result=$this->connection->query("select 1 from $table");
        if(!$result){
            $query=$create;
            $this->connection->query($query);
        }
    }

    public function login($username,$password)
    {
         $sql="select * from users where  email='$username' and password='$password'";
         $result=$this->connection->query($sql);

         $res=mysqli_num_rows($result);
         return $res;
    }

    public function register($password)
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="insert into users (full_name,username,email,password) values (:full_name,:username,:email,:password)";
        $reslut=$con->prepare($str);
        $reslut->execute(['full_name'=>$_POST['full_name'],'username'=>$_POST['username'],'email'=>$_POST['email'],'password'=>$password]);
//        var_dump($reslut);
//        die;
        return $reslut->rowCount();
    }

    public function users()
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="select * from users";
        $reslut=$con->prepare($str);
        $reslut->execute();
        return $reslut->fetchAll();
    }
    public function news()
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="select * from news";
        $reslut=$con->prepare($str);
        $reslut->execute();
        return $reslut->fetchAll();
    }
    public function news_index()
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="select * from news where status=1";
        $reslut=$con->prepare($str);
        $reslut->execute();
        return $reslut->fetchAll();
    }
    public function add_news($url)
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="insert into news (title,news_type,body,imag_url)values(:title,:news_type,:body,:imag_url)";
        $reslut=$con->prepare($str);
        $reslut->execute(['title'=>$_POST['title'],'news_type'=>$_POST['news_type'],'body'=>$_POST['body'],'imag_url'=>$url]);
        return $reslut->rowCount();
    }
    public function user($id)
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="select * from users where id=:id";
        $reslut=$con->prepare($str);
        $reslut->execute(['id'=>$id]);
        return $reslut->fetch();
    }

    public function user_edit($id)
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="select * from users where id=:id";
        $reslut=$con->prepare($str);
        $reslut->execute(['id'=>$id]);
        return $reslut->fetch();
    }

    public function user_delete($id)
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="delete  from users where id=:id";
        $reslut=$con->prepare($str);
        $reslut->execute(['id'=>$id]);
        return $reslut->rowCount();
    }

    public function update_user()
    {
        $con=new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_user,$this->db_password);
        $str="update users set full_name=:full_name , username=:username, email=:email , is_active=:is_active,is_admin=:is_admin where id=:id";
        $reslut=$con->prepare($str);
        $reslut->execute(['full_name'=>$_POST['full_name'],'username'=>$_POST['username'],'email'=>$_POST['email'],'is_active'=>$_POST['is_active'],'is_admin'=>$_POST['is_admin'],'id'=>$_POST['id']]);
        return $reslut->rowCount();
    }

}

