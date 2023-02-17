<!-- php

$db_user = "root";
$db_pass = "";
$db_name = "useraccounts";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




 -->
 <?php

defined('_PATHANG') or die;
class modelInstall{
    public function main($request){
            $db_name = $request->get('db_name');
            $host = $request->get('host');
            $user =$request->get('db_username');
            $pass = $request->get('db_password');


            $site_name = $request->get('site_name');
            $site_url = $request->Get('site_url');
            $this->create_db($db_name,$host,$user,$pass);
            $this->create_tables($db_name,$host,$user,$pass);
            $this->update_config($site_name,$site_url,$db_name,$host,$user,$pass);
    }
    public function create_db($db_name,$host,$user,$pass)
    {
            try {
                $db = new PDO("mysql:host=localhost", 'root', 'mypassword');

                $db->exec("CREATE DATABASE `feedstack`;") 
                or die(print_r($db->errorInfo(), true));
            } catch (PDOException $e) {
                die("DB ERROR: ". $e->getMessage());
            }   
    }