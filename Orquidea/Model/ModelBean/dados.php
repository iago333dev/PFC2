<?php


/**
 * Classe que no banco (a tabela) possui todos os dados de nossos usuarios
 *
 * @author ietzz [Iago Alves]
 */
class dados {
    private $nome;
    private $cpf;
    private $email;
    private $telefone1;
    private $telefone2;
    private $datanasc;
    // Os atributos abaixo seram inseridos na tabela "Loginusuario & Usuario";
    private $login;
    private $senha;
    
    // Atributos da tabela endereco
    private $logradouro;
    private $bairro;
    private $cep;
    private $cidade;
    private $uf;
    private $pais;
    
    //Atributos da Tabela Empresa
    private $empresa_nome;
    private $empresa_cnpj;



    public function SetEndereco($log,$bai,$cep,$cid,$uf,$pais){
        $this->logradouro = $log;
        $this->bairro = $bai;
        $this->cep = $cep;
        $this->cidade = $cid;
        $this->uf = $uf;
        $this->pais = $pais;    
    }

    public function GetLogradouro(){return $this->logradouro;}
    public function GetBairro(){return $this->bairro;}
    public function GetUf(){return $this->uf;}
    public function GetCep(){return $this->cep;}
    public function GetCidade(){return $this->cidade;}
    public function GetPais(){return $this->pais;}

    // Construct com Dados
    
    
    public function __construct($a,$b,$c,$d,$e,$f){
        $this->nome = $a;
        $this->cpf = $b;
        $this->email = $c;
        $this->telefone1 = $d;
        $this->telefone2 = $e;
        $this->datanasc = $f;    
}

// Função de instaciamento de credencias de acesso

public function SetAcesso ($login,$senha){
    $this->login = $login;
    $this->senha = $senha;
    
}

// Função para acessar valores instanciados

public function GetNome(){return $this->nome;}
public function GetCpf(){return $this->cpf;}
public function GetEmail(){return $this->email;}
public function GetTelefone1(){return $this->telefone1;}
public function GetTelefone2(){return $this->telefone2;}
public function GetDatanasc(){return $this->datanasc;}
public function GetLogin(){return $this->login;}
public function GetSenha(){return $this->senha;}
}


