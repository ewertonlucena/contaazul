<h1>Clientes</h1>
<?php if(empty($clients_list)) :?>
<div class="warning" >Não há clientes cadastrados</div>
<?php endif; ?>
<?php $cores = array('#f9f9f9', '#dddddd'); ?>
<?php if($edit_permission) :?>
<div class="button"><a href="<?php echo BASE_URL; ?>/clients/add">Adicionar Cliente</a></div>
<?php endif; ?>
<br/>
<?php if(!empty($clients_list)) :?>
<div>
    <table border="0" width="100%">
        <tr>
            <th>Nome</th>        
            <th>Ações</th>
        </tr>
        <?php foreach ($clients_list as $key => $c) : ?>
            <tr bgcolor="<?php echo $cores[$key % 2]; ?>">
                <td><?php echo $c['name']; ?></td>            
                <td width="150">
                    <div class="button button_small">
                        <a href="<?php echo BASE_URL; ?>/clients/edit/<?php echo $c['id']; ?>">Editar
                        </a>
                    </div>
                    <div class="button button_small">
                        <a href="<?php echo BASE_URL; ?>/clients/delete/<?php echo $c['id']; ?>" onclick="return confirm
                                        ('Deseja Excluir esta Permissão?')">Excluir
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>            
    </table>
</div>
<?php endif; ?>