<h1>Permissões - Adicionar Grupo</h1>

<form method="POST">
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
        $cores = array('#f9f9f9', '#ddd');
        ?>
        <?php foreach ($permissions_list as $key => $p) : ?>
        <tr bgcolor="<?php echo $cores[$key % 2]; ?>">                
            <td width="30">
                <input type="checkbox" name="permissions[]" value="<?php 
                echo $p['id']; ?>" id="<?php echo $p['id']; ?>"/>                    
                <label for="<?php echo $p['id']; ?>"><?php echo $p['name']; 
                ?></label>
            </td>
        </tr>
        <?php endforeach; ?>            
    </table>
    <br/>
    <input type="submit" value="Adicionar" /> 
</form>

