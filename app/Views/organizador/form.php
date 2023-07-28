<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
<h1>Cadastro</h1>
<?php echo form_open('main/store');?>
<p>
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" value="<?php echo isset($organizador['nome']) ? $organizador['nome'] : ''; ?>">
</p>
<p>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo isset($organizador['email']) ? $organizador['email'] : ''; ?>">
</p>
<p>
    <label for="senha">Senha</label>
<input type="password" name="senha" id="senha" value="<?php echo isset($organizador['senha']) ? $organizador['senha'] : ''; ?>">
</p>
<p>
    <input type="submit" value="Salvar">
</p>
<input type="hidden" name="id" value="<?php echo isset($organizador['id']) ? $organizador['id'] : ''; ?>">
    </form>
</body>
</html>