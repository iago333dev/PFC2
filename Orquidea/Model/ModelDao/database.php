<?php

class DatabaseUtility{
    
    
        private $dsn, $username, $password, $database, $host;
		public $name, $pdo;
        public function __construct($host = "127.0.0.1:3306", $username ="ietzz", $password = "856252", $database = "mydb"){
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
        
        public function cadas_dados ($a,$b,$c,$d,$e,$f,$g,$h,$i,$j) {
            $sql = "INSERT INTO Dados (idDados,Nome,CPF,Email,Telefone1,Telefone2,Endereco,Bairro,UF,Pais,Nascimento) VALUES(DEFAULT,'$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";
            $this->pdo->query($sql);
            
        }
        
        //Atráves dessa função será buscado no Banco o ID do usuario cadastrado naquele momento;
        public function find_id ($cpf) {
            $sql = "select * from Dados";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($cpf == $linha['CPF']){
                   return $linha['idDados'];
                }
            }
        }
    
        
       public function insert_user ($login,$senha,$id){
            $sql2 = "INSERT INTO Loginusuario (idLogin,Login,Senha,Usuario_idUsuario) VALUES (DEFAULT,'$login','$senha','$id')";
            $this->pdo->query($sql2);
           
       }
        
}
