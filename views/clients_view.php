<h1>Clientes</h1>
<h3>Visualizar Clientes</h3>
<?php if($client_info['error_msg'] == 1) : ?>
<div class="warning"><?php echo "Cliente não localizado! "; ?></div>
<br/>
<?php else: ?>
<form accept-charset="ISO-8859-1" method="POST">
    <input type="hidden" name="url" id="url" value="<?php echo BASE_URL; ?>/clients" />
    
    <label for="name">Nome: </label>
    <input type="text" name="name" id="name" required autofocus value="<?php echo $client_info['name']; ?>" disabled/><br/><br/>
    
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" value="<?php echo $client_info['email']; ?>" disabled /><br/><br/>
    
    <label for="cpf">CPF:</label>
    <input type="number" name="cpf" id="cpf" disabled pattern="[0-9]{11}" placeholder="Apenas números" title="Apenas números" required value="<?php echo $client_info['cpf']; ?>" /><br/><br/>
    
    <label for="phone">Telefone:</label>
    <input type="text" name="phone" id="phone" disabled pattern="[0-9 ()-]{10,16}" title="Apenas telefones válidos&#10;(xx) x xxxx-xxxx" placeholder="(xx) x xxxx-xxxx" value="<?php echo $client_info['phone']; ?>" /><br/><br/>
    
    <label for="cell_phone">Celular:</label>
    <input type="text" name="cell_phone" id="cell_phone" disabled pattern="[0-9 ()-]{10,16}" title="Apenas telefones válidos&#10;(xx) x xxxx-xxxx" placeholder="(xx) x xxxx-xxxx" value="<?php echo $client_info['cell_phone']; ?>" /><br/><br/>
    
    <label for="stars">Estrelas:</label>
    <select name="stars" id="stars" disabled>
        <option value="1" <?php echo ($client_info['stars'] == 1)?'selected="selected"':''; ?>>1 Estrela</option>
        <option value="2" <?php echo ($client_info['stars'] == 2)?'selected="selected"':''; ?>>2 Estrelas</option>
        <option value="3" <?php echo ($client_info['stars'] == 3)?'selected="selected"':''; ?> >3 Estrelas</option>
        <option value="4" <?php echo ($client_info['stars'] == 4)?'selected="selected"':''; ?>>4 Estrelas</option>
        <option value="5" <?php echo ($client_info['stars'] == 5)?'selected="selected"':''; ?>>5 Estrelas</option>
    </select><br/><br/>
    
    <label for="internal_obs">Observações: </label>
    <textarea name="internal_obs" id="internal_obs" disabled value="<?php echo $client_info['internal_obs']; ?>" ></textarea><br/><br/>
    
    <label for="addr_zipcode">CEP: </label>
    <input class="" type="text" name="addr_zipcode" id="addr_zipcode" disabled required value="<?php echo $client_info['addr_zipcode']; ?>" />
    <br/><br/>
    
    <label for="addr">Endereço: </label>
    <input type="text" name="addr" id="addr" disabled value="<?php echo $client_info['addr']; ?>" />
    <br/><br/>
    
    <label for="addr_number">Número: </label>
    <input type="text" name="addr_number" id="addr_number" disabled value="<?php echo $client_info['addr_number']; ?>" />
    <br/><br/>
    
    <label for="addr_compl">Complemento:  </label>
    <input type="text" name="addr_compl" id="addr_compl" disabled value="<?php echo $client_info['addr_compl']; ?>" />
    <br/><br/> 
    
    <label for="addr_neighbor">Bairro: </label>
    <input type="text" name="addr_neighbor" id="addr_neighbor" disabled value="<?php echo $client_info['addr_neighbor']; ?>" />
    <br/><br/>
    
    <label for="addr_city">Cidade: </label>
    <input type="text" name="addr_city" id="addr_city" disabled value="<?php echo $client_info['addr_city']; ?>" />
    <br/><br/>
    
    <label for="addr_state">Estado: </label>
    <input type="text" name="addr_state" id="addr_state" disabled value="<?php echo $client_info['addr_state']; ?>" />
    <br/><br/>
    
    <label for="addr_country">País: </label>
    <input type="text" name="addr_country" id="addr_country" disabled value="<?php echo $client_info['addr_country']; ?>" />
    <br/><br/>        
   
    <div class="button"><a href="<?php echo BASE_URL; ?>/clients">Voltar</a></div>
</form>
<?php endif; ?>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_clients.js"></script>
