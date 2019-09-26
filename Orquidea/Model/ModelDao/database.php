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


        public function cadas_empres ($a,$b,$c) {
            $sql = "INSERT INTO empresa (id,nome,cnpj,Endereco_id) VALUES(DEFAULT,'$a','$b','$c')";
            $this->pdo->query($sql);

        }

        public function cadas_func ($nome,$cpf,$email,$tel,$cel,$nasc,$login_id,$end_id,$emp_id) {
            $sql = "INSERT INTO funcionario (id,nome,cpf,email,telefone,celular,nascimento,login_id,endereco_id,Empresa_id) VALUES(DEFAULT,'$nome','$cpf','$email','$tel','$cel','$nasc','$login_id','$end_id',$emp_id)";
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


        public function find_emp_id ($cnpj) {
            $sql = "select * from empresa";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($cnpj == $linha['cnpj']){
                   return $linha['id'];
                }
            }
        }


       public function insert_user ($login,$senha){
            $sql2 = "INSERT INTO Login (id,usuario,senha,nivel) VALUES (DEFAULT,'$login','$senha','Funcionario')";
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

        
    public function login ($login,$senha) {
            $sql = "select * from login";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($login == $linha['usuario'] && $senha == $linha['senha']){
                    return $linha['nivel'];
                }
                
             
            }
        }

    public function insert_login_cliente ($login,$senha){
            $sql3 = "INSERT INTO Login (id,usuario,senha,nivel) VALUES (DEFAULT,'$login','$senha','Cliente')";
            $this->pdo->query($sql3);
       }
       
    public function cadas_cliente ($nome,$cpf,$email,$tel,$cel,$nasc,$login_id,$end_id) {
            $sql = "INSERT INTO cliente (id,nome,cpf,email,telefone,celular,nascimento,login_id, endereco_id) VALUES(DEFAULT,'$nome','$cpf','$email','$tel','$cel','$nasc','$login_id','$end_id')";
            $this->pdo->query($sql);

        }
        
        public function login_id_test ($login,$senha) {
            $sql = "select * from login";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($login == $linha['usuario'] && $senha == $linha['senha']){
                    
                    return $linha['id'];
                }
        
            }
        }
        
        public function login_id_nome ($id) {
            $sql = "select * from cliente";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($id == $linha['login_id']){
                    return $linha['nome'];
                }
                
             
            }
        }
        
       public function login_id_nome2 ($id) {
            $sql = "select * from funcionario";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($id == $linha['login_id']){
                    return $linha['nome'];
                }
                
             
            }
        }
		
		public function getdatabase_cpf ($id) {
        $sql = "select * from funcionario";
	    $query = $this->pdo->query($sql);
	    while ($linha=$query->fetch(PDO::FETCH_ASSOC))
	       {
                if($id == $linha['login_id']){
                    return $linha['cpf'];
                }    
            }
        }

        public function getdatabase_email ($id) {
        $sql = "select * from funcionario";
        $query = $this->pdo->query($sql);
        while ($linha=$query->fetch(PDO::FETCH_ASSOC))
           {
                if($id == $linha['login_id']){
                    return $linha['email'];
                }    
            }
        }

		
        public function getdatabase_tel1 ($id) {
        $sql = "select * from funcionario";
        $query = $this->pdo->query($sql);
        while ($linha=$query->fetch(PDO::FETCH_ASSOC))
           {
                if($id == $linha['login_id']){
                    return $linha['telefone'];
                }    
            }
        }

        public function getdatabase_tel2 ($id) {
        $sql = "select * from funcionario";
        $query = $this->pdo->query($sql);
        while ($linha=$query->fetch(PDO::FETCH_ASSOC))
           {
                if($id == $linha['login_id']){
                    return $linha['celular'];
                }    
            }
        }

        public function getdatabase_datnasc ($id) {
        $sql = "select * from funcionario";
        $query = $this->pdo->query($sql);
        while ($linha=$query->fetch(PDO::FETCH_ASSOC))
           {
                if($id == $linha['login_id']){
                    return $linha['nascimento'];
                }    
            }
        }
        
        public function update_func_name ($nome,$id){
            $sql3 = "UPDATE Funcionario SET nome='$nome' WHERE login_id='$id'";
            $this->pdo->query($sql3);
       }

        public function update_func_cpf ($cpf,$id){
            $sql4 = "UPDATE Funcionario SET cpf='$cpf' WHERE login_id='$id'";
            $this->pdo->query($sql4);
       }

        public function update_func_email ($email,$id){
            $sql4 = "UPDATE Funcionario SET email='$email' WHERE login_id='$id'";
            $this->pdo->query($sql4);
       }

        public function update_func_tel1 ($tel1,$id){
            $sql4 = "UPDATE Funcionario SET telefone='$tel1' WHERE login_id='$id'";
            $this->pdo->query($sql4);
       }


        public function update_func_tel2 ($tel2,$id){
            $sql4 = "UPDATE Funcionario SET celular='$tel2' WHERE login_id='$id'";
            $this->pdo->query($sql4);
       }


        



        
}


