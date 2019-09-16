<?php


class empresa {
    
    /**
 * Classe que representa o cadastro das empresas
 *
 * @author ietzz [Iago Alves]
 */
    private $nome;
    private $cnpj;
    private $contato1;
    private $contato2;
    private $endereco;
    private $bairro;
    private $uf;
    // private $usuario_id 
    //Ainda falta por o ID do Usuario Aqui!!!!!!
    
    public function __construct($nome,$cnpj,$contato1,$contato2,$endereco,$bairro,$uf) {
        $this->nome = $nome;
        $this->cnpj = $cnpj; 
        $this->contato1 = $contato1;
        $this->contato2 = $contato2;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->uf = $uf;
    }
    

    // NOME -----------------
    public function GetNome (){
       return $this->nome;       
   }
   
   
   // CNPJ ------------------
   public function GetCnpj (){
       return $this->cnpj;       
   }

   
   // CONTATO 1 -------------   
  
   public function GetContato1 (){
       return $this->contato1;       
   }
       
    // CONTATO 2  -------------   
  
   public function GetContato2 (){
       return $this->contato2;       
   }
   

   
      // Endereco -------------   
  
   public function GetEndereco (){
       return $this->endereco;       
   }
   
      // CONTATO -------------   
  
   public function GetBairro (){
       return $this->bairro;       
   }

    
     // UF -------------   
  
   public function GetUf (){
       return $this->uf;       
   }
 
    
       
   
        
    
    
    
}
