
<?php 
/* Pagina para manipulacao de dados via ajax*/
if(isset($_GET['idpacote'])){
    include_once('../classes/LineUp.dao.php');
    include_once('../classes/Canais.dao.php');
    
    $idpacote = $_GET['idpacote'];
    $arrCanais = array();
    if(isset($_GET['canal'])){
        foreach($_GET['canal'] as $ch){
            $arrCanais[] = $ch;
        }
        LineUpDAO::insere($idpacote, $arrCanais);
        LineUpDAO::deleta($idpacote, $arrCanais);
        header('Location: ../../lineup/editar/');
    }
    else{
        LineUpDAO::deletaTudo($idpacote);
        header('Location: ../../lineup/editar/');
    }
}    
    
    
    
    if(isset($_GET['tipoSolicitacao'])){
        include_once('../classes/Solicitacoes.dao.php');
        include_once('../classes/SolXProd.dao.php');
//        $data_solicitacao = NOW(); 
        $tecnico = 7;
        $status_solicitacao =1; 
        $categoria = $_GET['tipoSolicitacao'];
        $id_solicitacao = SolicitacoesDAO::insere($tecnico, $status_solicitacao, $categoria);
        
        
        
        $arrProdutos = array();
        $arrQntProdutos = array();
        foreach($_GET['quantidade'] as $qntProduto){
            $arrQntProdutos[] = $qntProduto;
        }
        
        foreach ($_GET['produto'] as $key => $id_produto) {
            if($arrQntProdutos[$key]>0){
                SolXProdDAO::insere($id_solicitacao,$id_produto,$arrQntProdutos[$key]);
            }
        }
        header('Location: ../../solicitacoes/minhas-solicitacoes/');

    }
    
if(isset($_POST['novo-tecnico'])){
    include_once('../classes/Tecnicos.dao.php');
    
    
    $login = strtoupper($_POST['login']); 
    $atlas = $_POST['atlas']; 
    $nome_tecnico = $_POST['nome']; 
    $cargo = $_POST['cargo'];
    $celular = $_POST['pda']; 
    $email = $_POST['email'];
    $status_tecnico = 1;
    
    function gerarUsuario($id,$usuario){
        include_once('../classes/Usuarios.dao.php');
        include_once('../classes/gerarSenha.php');
        
        $senha = gerar_senha(8, true, true, true, false);
        $nivel_acesso = 1;
        $status_usuario = 1;
        $tecnico = $id;
        $funcao_no_sistema = 1;
        UsuariosDAO::insere($usuario, $senha, $nivel_acesso, $status_usuario, $tecnico, $funcao_no_sistema);
    }
    if($_POST['novo-tecnico']!=0 && $_POST['novo-tecnico']!=''){
        $id = $_POST['novo-tecnico'];
        TecnicoDAO::atualiza($id, $login, $nome_tecnico, $cargo, $celular, $email);
        if(isset($_POST['gerar-user'])){
            $id = TecnicoDAO::retornaTecnicoPorLogin($login);
            $usuario = $login;//nome qualquer que servirá de usuário de acesso para o sistema
            gerarUsuario($id->getIdtecnico(), $usuario);
        }
    }
    else{
        TecnicoDAO::insere($login, $nome_tecnico, $cargo, $celular, $email, $status_tecnico);
        if(isset($_POST['gerar-user'])){
            $id = TecnicoDAO::retornaTecnicoPorLogin($login);
            $usuario = $login;//nome qualquer que servirá de usuário de acesso para o sistema
            gerarUsuario($id->getIdtecnico(), $usuario);
        }
        
    }
    
}
if(isset($_POST['remove-tecnico'])){
    include_once('../classes/Tecnicos.dao.php');
    $idtecnico = $_POST['remove-tecnico'];
    TecnicoDAO::exclui($idtecnico);
}


    
    
?>