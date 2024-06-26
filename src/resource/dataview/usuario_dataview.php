<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogin();

use Src\controller\setorController;
use Src\controller\UsuarioController;
use Src\VO\FuncionarioVO;
use Src\VO\TecnicoVO;
use Src\VO\UsuarioVO;

$setorCTRL = new setorController();
$usuarioCTRL = new UsuarioController();

$id = '';
if (isset($_POST['carregaSetor'])) :
    $setor = $setorCTRL->SelecioneSetorCtrl(); ?>
    <select id="Setor" name="Setor" class="form-control">
        <option value="">Selecione</option>
        <?php foreach ($setor as $s) : ?>
            <option value="<?= $s['id'] ?>"><?= $s['nome_setor'] ?></option>
        <?php endforeach; ?>
    </select>
<?php
elseif (isset($_POST['verificarEmail']) and $_POST['verificarEmail'] == 'ajx') :
    $ret = $usuarioCTRL->VerificarEmailDuplicadoCTRL($_POST['Email']);
    if ($ret)
        echo 1; // Não existe
    else
        echo -1; // Já existe, deixa cadastrar o email
elseif (isset($_POST['btnAlterar'])) :

    switch ($_POST['Tipo']) {
        case PERFIL_ADM :
            $vo = new UsuarioVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            $vo->setId($_POST['idUser']);
            break;
        case PERFIL_FUNCIONARIO :
            $vo = new FuncionarioVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            $vo->setIdSetor($_POST['Setor']);
            $vo->setId($_POST['idUser']);
            break;    
        case PERFIL_TECNICO :
            $vo = new TecnicoVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            $vo->setNomeEmpresa($_POST['Emp']);
            $vo->setId($_POST['idUser']);
            break;
    }
    $vo->setCep($_POST['cep']);
    $vo->setRua($_POST['rua']);
    $vo->setBairro($_POST['bairro']);
    $vo->setNomeCiadade($_POST['cidade']);
    $vo->setSiglaEstado($_POST['uf']);
    $vo->setIdEnd($_POST['idEnd']);
    $ret = $usuarioCTRL->AlterarUsuarioCTRL($vo);
    Util::ChamarPagina("consultar_usuario.php?nome=$_POST[Nome]&ret=$ret");
    if ($_POST['btnAlterar'] == 'ajx') :
        echo $ret;
    endif;
elseif (isset($_POST['btnGravar'])) :

    switch ($_POST['Tipo']) {
        case PERFIL_ADM :
            $vo = new UsuarioVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            break;
        case PERFIL_FUNCIONARIO :
            $vo = new FuncionarioVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            $vo->setIdSetor($_POST['Setor']);
            break;
        case PERFIL_TECNICO :
            $vo = new TecnicoVO();
            $vo->setNome($_POST['Nome']);
            $vo->setLogin($_POST['Email']);
            $vo->setFone($_POST['Fone']);
            $vo->setTipo($_POST['Tipo']);
            $vo->setNomeEmpresa($_POST['Emp']);
            break;
    }
    $vo->setCep($_POST['cep']);
    $vo->setRua($_POST['rua']);
    $vo->setBairro($_POST['bairro']);
    $vo->setNomeCiadade($_POST['cidade']);
    $vo->setSiglaEstado($_POST['uf']);
    $ret = $usuarioCTRL->CadastrarUsuarioCTRL($vo);

    if ($_POST['btnGravar'] == 'ajx') :
        echo $ret;
    endif;
elseif (isset($_POST['filtrarPessoa']) and $_POST['filtrarPessoa'] == 'ajx') :
    $pessoas = $usuarioCTRL->FiltrarUsuarioCTRL($_POST['nome']); ?>
    <table class="table table-hover" id="listaPessoas">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoas as $p) : ?>
                <tr>
                    <td>
                        <a href="alterar_usuario.php?id_user=<?= $p['id'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                        <?php if ($p['id'] != Util::CodigoLogado()) { ?>
                        <a onclick="CarregarModalStatus('<?= $p['id'] ?>','<?= $p['nome'] ?>','<?= $p['status'] ?>')" data-toggle="modal" data-target="#modal-status" class="btn btn-<?= $p['status'] == STATUS_ATIVO ? "danger" : "success" ?> btn-xs"><?= $p['status'] == STATUS_ATIVO ? "Inativar" : "Ativar" ?></a>
                        <?php } ?>
                    </td>
                    <td><?= $p['nome'] ?></td>
                    <td><?= Util::DescricaoTipo($p['tipo']) ?></td>
                    <td><span class="badge badge-<?= $p['status'] == STATUS_ATIVO ? "success" : "danger" ?>"><?= Util::DescricaoStatus($p['status']) ?></span></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
elseif (isset($_POST['mudarStatus']) and $_POST['mudarStatus'] == 'ajx') :
    $vo = new UsuarioVO;
    $vo->setId($_POST['idStatus']);
    $vo->setStatus($_POST['statusAtual']);
    echo $usuarioCTRL->MudarStatusCTRL($vo);
elseif (isset($_GET['id_user']) and is_numeric($_GET['id_user'])) :
    $id = $_GET['id_user'];    
    $user = $usuarioCTRL->DetalharUsuarioCTRL($id);
    if (empty($user)) :
        Util::ChamarPagina("consultar_usuario.php");
    endif;
    if ($user['tipo'] == PERFIL_FUNCIONARIO) :
        $setor = $setorCTRL->SelecioneSetorCtrl();
    endif;
endif; ?>