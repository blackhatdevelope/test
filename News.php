<?php
class News{

    public  $table='news';

    public function create_news()
    {
        $create="CREATE TABLE $this->table (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(254) NOT NULL,
            news_type VARCHAR(254) NOT NULL,
            view_count INT (6) DEFAULT 0,
            slug VARCHAR(254)  ,
            body LONGTEXT ,
            imag_url VARCHAR(254)  ,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            status BOOLEAN DEFAULT 0
           )";
        return $create;
    }
}
//include 'database.php';
//$news=new News();
//$db=new DataBase();
//$db->connect_db();
//$db->table_exist('news',$news->create_news());
