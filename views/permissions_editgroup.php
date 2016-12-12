<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupos</div>
    <div class="tabitem"><a href="<?php echo BASE_URL.'/permissions/ptab'; ?>">Permissões</a></div>
</div>
<div class="tabcontent">

    <div class="tabbody groups activebody" style="display: block">
        <h3>Permissões - Editar Grupo</h3>
        <form method="POST">
            <label for="name">Nome do Grupo</label><br/>
            <input type="text" name="name" width="30%" value="<?php echo $group_info['name']; ?>" /><br/><br/>
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
                            <input type="checkbox" name="permissions[]" value="<?php echo $p['id']; ?>" id="<?php echo $p['id']; ?>" <?php echo (in_array($p['id'], $group_info['params'])) ? 'checked="checked"' : ''; ?> />                    
                            <label for="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
                        </td>
                    </tr>
                <?php endforeach; ?>            
            </table>
            <br/>
            <input type="submit" value="Editar" />
            <div class="button"><a href="<?php echo BASE_URL . '/permissions'; ?>" >Cancelar</a></div>
        </form>           
    </div>
</div>
