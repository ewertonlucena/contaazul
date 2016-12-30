<h1>Clientes</h1>
<?php if (empty($clients_list)) : ?>
    <div class="warning" >Não há clientes cadastrados</div>
<?php endif; ?>
<?php if (!empty($clients_list)) : ?>

    <?php $cores = array('#f9f9f9', '#dddddd'); ?>

    <?php if ($edit_permission) : ?>
    <div class="button"><a href="<?php echo BASE_URL; ?>/clients/add">Adicionar Cliente</a></div>
        <br/>
    <?php endif; ?>

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
                        <?php if ($edit_permission): ?>
                            <div class="button button_small">
                                <a href="<?php echo BASE_URL; ?>/clients/edit/<?php echo $c['id']; ?>">Editar
                                </a>
                            </div>
                            <div class="button button_small">
                                <a href="<?php echo BASE_URL; ?>/clients/delete/<?php echo $c['id']; ?>" onclick="return confirm
                                                    ('Deseja Excluir este Cliente?')">Excluir
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="button button_small">
                                <a href="<?php echo BASE_URL; ?>/clients/view/<?php echo $c['id']; ?>">Visualizar
                                </a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <div class="pagination">
            <a href="<?php echo ($p < 2) ? '#' : BASE_URL . '/clients'; ?>"><span class="pag_item button button_small <?php echo ($p < 2) ? 'disabled' : ''; ?>">Primeira Página</span></a>
            <?php for (($p==$p_count-1)?$q = $p + 1 - $max_links - 1:$q = $p + 1 - $max_links ; $q <= $p + 1; $q++): ?>
                <?php if ($q < 1): ?>
                <?php else: ?>
                    <a href="<?php echo BASE_URL . "/clients?p=" . $q; ?>"><span class="pag_item button button_small <?php echo ($q == $p + 1) ? 'activepag' : ''; ?>"><?php echo $q; ?></span></a>
                <?php endif; ?>
            <?php endfor; ?>
            <?php for ($q = $p + 2; ($p==0)?$q <= $p+2 + $max_links:$q <= $p+1 + $max_links; $q++): ?>
                <?php if (($q > $p_count) ): ?>
                <?php else: ?>
                    <a href="<?php echo BASE_URL . "/clients?p=" . $q; ?>"><span class="pag_item button button_small <?php echo ($q == $p + 1) ? 'activepag' : ''; ?>"><?php echo $q; ?></span></a>
                <?php endif; ?>
            <?php endfor; ?>
            <a href="<?php echo ($p > $p_count - 3) ? '#' : BASE_URL . '/clients?p=' . $p_count; ?>"><span class="pag_item button button_small <?php echo ($p > $p_count - 3) ? 'disabled' : ''; ?>">Última Página</span></a>
        </div>
    </div>
<?php endif; ?>