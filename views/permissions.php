<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem <?php echo ($index == 'index')?'activetab':''; ?>">Grupos</div>
    <div class="tabitem <?php echo ($index == 'ptab')?'activetab':''; ?>">Permissões</div>
</div>
<div class="tabcontent">
    
    <div class="tabbody groups activebody" <?php echo ($index == 'index')?'style="display: block"':''; ?>>
        
            <div class="button loadAddGroup" >Adicionar Grupo</div><!--/a-->
        <br/>        
        <table border="0" width="100%">
            <tr>
                <th>Nome do Grupo</th>
                <th>Ações</th>
            </tr>
            <?php 
                $cores = array('#f9f9f9','#dddddd');
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
    
    <div class="tabbody permissions" <?php echo ($index == 'ptab')?'style="display: block"':''; ?>>        
        <div class="button loadAdd" >Adicionar Permissão</div>
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
        
    <div class="tabbody addGroup">
        <h3>Permissões - Adicionar Grupo</h3>
        <form action="<?php echo BASE_URL; ?>/permissions/addGroup" method="POST">
            <label for="name">Nome do Grupo</label><br/>
            <input type="text" name="name" width="30%"/><br/><br/>
            <table border="0" width="300px">
                <tr>
                    <th colspan="2">
                        <input type="checkbox" id="chkAll" name="checkAll"/>
                        <label for="chkAll">Todas Permissões</label>
                    </th>
                </tr>
                <?php
                    $cores = array('#f9f9f9', '#dddddd');
                ?>
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
    
    <div class="tabbody editGroup">
        <h3>Editar Grupo</h3>
        <form method="POST">
            <label for="name">Nome do Grupo</label><br/>
            <input type="text" name="name" width="30%" value="<?php 
                echo $group_info['name']; ?>" /><br/><br/>
            <table border="0" width="300px">
                <tr>
                    <th colspan="2">
                        <input type="checkbox" id="chkAll" name="checkAll"/>
                        <label for="chkAll">Todas Permissões</label>
                    </th>                
                </tr>
                <?php
                    $cores = array('#f9f9f9', '#dddddd');
                ?>
                <?php foreach ($permissions_list as $key => $p) : ?>
                <tr bgcolor="<?php echo $cores[$key % 2]; ?>">                
                    <td width="30">
                        <input type="checkbox" name="permissions[]" value="<?php 
                            echo $p['id']; ?>" id="<?php echo $p['id']; ?>" <?php 
                            echo (in_array($p['id'], $group_info['params']))?'checked="checked"':''; ?> />                    
                        <label for="<?php echo $p['id']; ?>"><?php echo $p['name']; 
                        ?></label>
                    </td>
                </tr>
                <?php endforeach; ?>            
            </table>
            <br/>
            <input type="submit" value="Editar" />
                <div class="button"><a href="<?php 
                    echo BASE_URL.'/permissions'; ?>" >Cancelar</a>
                </div>
        </form>
    </div>
    
    <div class="tabbody addPermission">
        <h3>Adicionar Permissão</h3>
        <form method="POST" id="formPermissions">
            <label for="name">Nome da Permissão</label><br/>
            <input type="hidden" name="url" id="url" value="<?php echo BASE_URL; ?>/permissions" />
            <input type="text" name="name" id="name" /><br/><br/>
            <input type="submit" value="Adicionar" />
            <div class="button loadPermissions">Cancelar</div>
        </form>
    </div>
</div>
