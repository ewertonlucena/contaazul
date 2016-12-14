<h1>Usuários</h1>
<h3>Adicionar Usuário</h3>
<form accept-charset="ISO-8859-1" method="POST">
    <label for="email">E-mail</label><br/>
    <input type="hidden" name="url" id="url" value="<?php echo BASE_URL; ?>/users" />
    <input type="email" name="email" id="email" required/><br/><br/>
    <input type="submit" value="Adicionar" />
    <div class="button"><a href="<?php echo BASE_URL; ?>/users">Cancelar</a></div>
</form>