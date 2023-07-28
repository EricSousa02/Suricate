<!--Página Inicial-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    
<!--Aviso para Confirmar Exclusão-->
    <script>

      function confirma(){
        if(!confirm("Confirma a exclusão?")){
          return false;
        }

        return true;
      }
    </script>

</head>
<body>
    <h1>Home</h1>
    <!--Tabela de Usuários Cadastrados-->
    <h3>Usuários Cadastrados</h3>
    <table>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
      </tr>

      <!--Loop Para Leitura de Dados-->
      <?php foreach($organizadores as $organizador): ?>
        <tr>
          <td><?php echo $organizador['id'] ?></td>
          <td><?php echo $organizador['nome'] ?></td>
          <td><?php echo $organizador['email'] ?></td>
          <td>
            <!--Editar/Excluir-->
            <?php echo anchor("main/edit/".$organizador['id'], 'Editar') ?>
            -
            <?php echo anchor("main/excluir/".$organizador['id'], 'Excluir', 'onclick="return confirma()"' ) ?>
        </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php echo anchor('main/create', 'Novo Usuário');?>
    -
    <?php echo anchor('main/login', 'Fazer Login');?>
</body>
</html>