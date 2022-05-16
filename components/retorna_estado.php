<?php
    $consultar_estado = "SELECT * FROM estado ORDER BY nome"; //variável que busca registros de estado no BD
    $retornar_estado = MySQLi_query($conn, $consultar_estado); //variável para retornar informações do BD
    $row_estado = MySQLi_fetch_assoc($retornar_estado);

    if(isset($id)){
        $consulta_cliente_estado = "SELECT cliente.idcidade, cidade.idcidade,estado.uf FROM cliente 
                                            INNER JOIN cidade ON cidade.idcidade = cliente.idcidade
                                            INNER JOIN estado ON estado.idestado = cidade.idestado WHERE cliente.idcliente =".$id;
                                            
        $retornar_estado_cliente = MySQLi_query($conn, $consulta_cliente_estado);
        while ($row_estado_cliente = MySQLi_fetch_assoc($retornar_estado_cliente)) {
            echo '<option value="'.$row_estado_cliente['cidade.idestado'].'" selected>'.$row_estado_cliente['uf'].'</option>';
        }
        while ($row_estado = MySQLi_fetch_assoc($retornar_estado)) {
            echo '<option value="'.$row_estado['idestado'].'">'.$row_estado['uf'].'</option>';
        }
    } else {
        while ($row_estado = MySQLi_fetch_assoc($retornar_estado)) {
            echo '<option value="'.$row_estado['idestado'].'">'.$row_estado['uf'].'</option>';
        }
    }
?>