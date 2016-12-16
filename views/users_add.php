<h1>Usuários</h1>
<?php if(isset($error_msg) && !empty($error_msg)) : ?>
<div class="warning"><?php echo $error_msg; ?></div>
<?php endif; ?>
<h3>Adicionar Usuário</h3>
<form accept-charset="ISO-8859-1" method="POST">
    <input type="hidden" name="url" id="url" value="<?php echo BASE_URL; ?>/users" />
    
    <label for="email">E-mail</label><br/>    
    <input type="email" name="email" id="email" required autofocus/><br/><br/>
    
    <label for="password">Senha</label><br/>    
    <input type="password" name="password" id="password" required pattern="[A-Za-z0-9]+" title="Apenas letras e números são permitidos"/><br/><br/>
    
    <label for="password">Grupo de Permissões</label><br/>    
    <select name="group" id="group" required >
        <?php foreach ($group_list as $g) : ?>
        <option value="<?php echo $g['id']; ?>"><?php echo $g['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br/><br/>
    
    <input type="submit" value="Adicionar" />
    <div class="button"><a href="<?php echo BASE_URL; ?>/users">Cancelar</a></div>
</form>