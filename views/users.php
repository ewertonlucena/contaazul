<h1>Usuários</h1>
<?php $cores = array('#f9f9f9', '#dddddd'); ?>
<div class="button" ><a href="<?php echo BASE_URL; ?>/users/add">Adicionar Usuário</a></div>
<br/>        
<table border="0" width="100%">
    <tr>
        <th>Email</th>
        <th>Grupo</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($user_list as $key => $us) : ?>
        <tr bgcolor="<?php echo $cores[$key % 2]; ?>">
            <td><?php echo $us['email']; ?></td>
            <td><?php echo $us['group_name']; ?></td>
            <td width="150">
                <div class="button button_small">
                    <a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $us['id']; ?>">Editar
                    </a>
                </div>
                <div class="button button_small">
                    <a href="<?php echo BASE_URL; ?>/users/delete/<?php echo $us['id']; ?>" onclick="return confirm
                                            ('Deseja Excluir esta Permissão?')">Excluir
                    </a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>            
</table>