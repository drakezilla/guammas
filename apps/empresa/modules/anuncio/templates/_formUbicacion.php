
<table>
    <tbody>
        <tr>
            <th>Mis ubicaciones</th>
            <td>
                <select name="ubicacion_anuncio[ubicacion_id][]" id="ubicacion_anuncio_ubicacion_id" multiple="multiple" >
                    <?php for ($i=0;$i<count($formUbicacion);$i++) { ?>
                        <option value="<?php echo $formUbicacion[$i]['id'] ?>"><?php echo $formUbicacion[$i]['nombre'] ?></option>
                    <?php } ?>
                </select>                
            </td>
        </tr>
    </tbody>
</table>