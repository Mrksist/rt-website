<?php 
    $config = file_get_contents("rt.conf");
    $host = explode("\n",explode("host=",$config)[1])[0];
    $user = explode("\n",explode("user=",$config)[1])[0];
    $password = explode("\n",explode("password=",$config)[1])[0];
    $database = explode("\n",explode("database=",$config)[1])[0];
    $table = explode("table=",$config)[1];
    $conn = new mysqli($host, $user, $password, $database);
    
    switch($conn->connect_errno){
        case 2002:
        case 1044:
        case 1045:
            printf("В соединении с базой данных отказано. Пожалуйста, убедитесь, что база данных MySQL подключена, а данные для входа верно указаны в rt.conf");
            die();
            break;
            
    }
    $q = $conn->query("SELECT * FROM information_schema.tables WHERE table_name='".$table."' LIMIT 1;");
    $rr = $q->fetch_row();
    if(!$rr){
        $r = $conn->query("CREATE TABLE ".$table."(
	        id int not null,
	        name varchar(20) null,
	        description text null,
	        date datetime null,
	        constraint articless_pk
		    primary key (id) 
        );");
        printf($r->field_count);
    }
    $conn->set_charset("utf8");
?>