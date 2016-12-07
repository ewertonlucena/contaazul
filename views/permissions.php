<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupos</div>
    <div class="tabitem">Permissões</div>
</div>
<div class="tabcontent">
    <div class="tabbody" style="display: block">
        <a href="<?php echo BASE_URL; ?>/permissions/addGroup">
            <div class="button" >Adicionar Grupo</div></a>
        <br/>        
        <table border="0" width="100%">
            <tr>
                <th>Nome do Grupo</th>
                <th>Ações</th>
            </tr>
            <?php 
                $cores = array('#f9f9f9','#ddd');
            ?>
            <?php foreach ($permissions_groups_list as $key => $p) : ?>
            <tr bgcolor="<?php echo $cores[$key % 2]; ?>">
                <td><?php echo $p['name']; ?></td>
                <td width="200">
                    <div class="button button_small">
                        <a href="<?php echo BASE_URL; 
                        ?>/permissions/editGroup/<?php 
                        echo $p['id']; ?>">Editar
                        </a>
                    </div>
                    <div class="button button_small">
                        <a href="<?php echo BASE_URL; 
                        ?>/permissions/deleteGroup/<?php 
                        echo $p['id']; ?>" onclick="return confirm
                        ('Deseja Excluir este Grupo de Permissões?')">Excluir
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>            
        </table>       
    </div>
    <div class="tabbody">
        <a href="<?php echo BASE_URL; ?>/permissions/add">
            <div class="button" >Adicionar Permissão</div></a>
        <br/>        
        <table border="0" width="100%">
            <tr>
                <th>Nome da permissão</th>
                <th>Ações</th>
            </tr>
            <?php 
                $cores = array('#f9f9f9','#ddd');
            ?>
            <?php foreach ($permissions_list as $key => $p) : ?>
            <tr bgcolor="<?php echo $cores[$key % 2]; ?>">
                <td><?php echo $p['name']; ?></td>
                <td width="100">
                    <div class="button button_small">
                        <a href="<?php echo BASE_URL; ?>/permissions/delete/<?php 
                        echo $p['id']; ?>" onclick="return confirm
                        ('Deseja Excluir esta Permissão?')">Excluir
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>            
        </table>        
    </div>
</div>
