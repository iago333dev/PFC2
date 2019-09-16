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
    private $endereco;
    private $bairro;
    private $uf;
    private $nacionalidade;
    private $datanasc;
    // Os atributos abaixo seram inseridos na tabela "Loginusuario & Usuario";
    private $login;
    private $senha;
    
    
    // Construct com Dados
    
    
    public function __construct($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
        $this->nome = $a;
        $this->cpf = $b;
        $this->email = $c;
        $this->telefone1 = $d;
        $this->telefone2 = $e;
        $this->endereco = $f;
        $this->bairro = $g;
        $this->uf = $h;
        $this->nacionalidade = $i;
        $this->datanasc = $j;    
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
public function GetEndereco(){return $this->endereco;}
public function GetBairro(){return $this->bairro;}
public function GetUf(){return $this->uf;}
public function GetNacionalidade(){return $this->nacionalidade;}
public function GetDatanasc(){return $this->datanasc;}
public function GetLogin(){return $this->login;}
public function GetSenha(){return $this->senha;}
}


