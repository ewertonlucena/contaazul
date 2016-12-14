<h1>Permiss�es</h1>
<?php $cores = array('#f9f9f9','#dddddd'); ?>

<div class="tabarea">
    <div class="tabitem <?php echo ($index == 'index')?'activetab':''; ?>">Grupos</div>
    <div class="tabitem <?php echo ($index == 'ptab')?'activetab':''; ?>">Permiss�es</div>
</div>
<div class="tabcontent">
    
    <div class="tabbody groups activebody" <?php echo ($index == 'index')?'style="display: block"':''; ?>>
        
            <div class="button loadAddGroup" >Adicionar Grupo</div><!--/a-->
        <br/>        
        <table border="0" width="100%">
            <tr>
                <th>Nome do Grupo</th>
                <th>A��es</th>
            </tr>            
            <?php foreach ($permissions_groups_list as $key => $p) : ?>
            <tr bgcolor="<?php echo $cores[$key % 2]; ?>">
                <td><?php echo $p['name']; ?></td>
                <td width="150">
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
                        ('Deseja Excluir este Grupo de Permiss�es?')">Excluir
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>            
        </table>       
    </div>
    
    <div class="tabbody permissions" <?php echo ($index == 'ptab')?'style="display: block"':''; ?>>        
        <div class="button loadAdd" >Adicionar Permiss�o</div>
        <br/>        
        <table border="0" width="100%">
            <tr>
                <th>Nome da permiss�o</th>
                <th>A��es</th>
            </tr>
            <?php foreach ($permissions_list as $key => $p) : ?>
            <tr bgcolor="<?php echo $cores[$key % 2]; ?>">
                <td><?php echo $p['name'] .' '. mb_detect_encoding($p['name']); ?></td>
                <td width="100">
                    <div class="button button_small">
                        <a href="<?php echo BASE_URL; ?>/permissions/delete/<?php 
                        echo $p['id']; ?>" onclick="return confirm
                        ('Deseja Excluir esta Permiss�o?')">Excluir
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>            
        </table>        
    </div>
        
    <div class="tabbody addGroup">
        <h3>Permiss�es - Adicionar Grupo</h3>
        <form action="<?php echo BASE_URL; ?>/permissions/addGroup" method="POST">
            <label for="name">Nome do Grupo</label><br/>
            <input type="text" name="name" width="30%"/><br/><br/>
            <table border="0" width="300px">
                <tr>
                    <th colspan="2">
                        <input type="checkbox" id="chkAll" name="checkAll"/>
                        <label for="chkAll">Todas Permiss�es</label>
                    </th>
                </tr>
                <?php foreach ($permissions_list as $key => $p) : ?>
                <tr bgcolor="<?php echo $cores[$key % 2]; ?>">
                    <td width="30">
                        <input type="checkbox" name="permissions[]" value="<?php 
                        echo $p['id']; ?>" id="<?php echo $p['id']; ?>"/>
                        <label for="<?php echo $p['id']; ?>"><?php 
                        echo $p['name']; ?></label>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <br/>
            <input class="loadGroups" type="submit" value="Adicionar" />
            <div class="button loadGroups">Cancelar</div>
        </form>
    </div>
    
    <div class="tabbody addPermission">
        <h3>Adicionar Permiss�o</h3>
        <form accept-charset="ISO-8859-1" method="POST" id="formPermissions">
            <label for="name">Nome da Permiss�o</label><br/>
            <input type="hidden" name="url" id="url" value="<?php echo BASE_URL; ?>/permissions" />
            <input type="text" name="name" id="name" /><br/><br/>
            <input type="submit" value="Adicionar" />
            <div class="button loadPermissions">Cancelar</div>
        </form>
    </div>
</div>
