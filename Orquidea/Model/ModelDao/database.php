<?php

class DatabaseUtility{
    
    
        private $dsn, $username, $password, $database, $host;
		public $name, $pdo;
        public function __construct($host = "127.0.0.1:3306", $username ="root", $password = "", $database = "mydb"){
            $this->host = $host;
            $this->dsn = "mysqli:dbname=$database;host:$host";
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        
        public function disconect(){$this->pdo->close();}
                
        
        public function connect(){
            try{
                $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password,null);
              //  $this->pdo = new PDO($this->dsn,$this->username,$this->password,null);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch(PDOException $err){
                die($err->getMessage());
            }
        }
        
        
        public function cadas_empres ($a,$b,$c,$d,$e,$f,$g) {
            $sql = "INSERT INTO Empresa (idEmpresa,Nome,CNPJ,Contato1,Contato2,Endereco,Bairro,UF) VALUES(DEFAULT,'$a','$b','$c','$d','$e','$f','$g')";
            $this->pdo->query($sql);
            
        }
        
        public function cadas_clien ($nome,$cpf,$email,$tel,$cel,$nasc,$login_id,$end_id) {
            $sql = "INSERT INTO Cliente (id,nome,cpf,email,telefone,celular,nascimento,login_id,endereco_id) VALUES(DEFAULT,'$nome','$cpf','$email','$tel','$cel','$nasc','$login_id','$end_id')";
            $this->pdo->query($sql);
            
        }
        
        //Atráves dessa função será buscado no Banco o ID do usuario cadastrado naquele momento;
        public function find_id ($user) {
            $sql = "select * from login";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($user == $linha['usuario']){
                   return $linha['id'];
                }
            }
        }
    
        
       public function insert_user ($login,$senha){
            $sql2 = "INSERT INTO Login (id,usuario,senha,nivel) VALUES (DEFAULT,'$login','$senha','Cliente')";
            $this->pdo->query($sql2);
           
       }
       
       public function insert_ender ($log,$bair,$cep,$cid,$uf,$pais){
            $sql3 = "INSERT INTO endereco (id,logradouro,bairro,cep,cidade,uf,pais) VALUES (DEFAULT,'$log','$bair','$cep','$cid','$uf','$pais')";
            $this->pdo->query($sql3);
           
       }
       
        public function find_ender_id ($cep) {
            $sql = "select * from endereco";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($cep == $linha['cep']){
                   return $linha['id'];
                }
            }
        }
        
}
