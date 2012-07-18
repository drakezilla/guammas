<table>
    <tbody>
        <?php echo $form->renderGlobalErrors() ?>
        <tr>
            <th><?php echo $form['titulo']->renderLabel() ?></th>
            <td>
                <?php echo $form['titulo']->renderError() ?>
                <?php echo $form['titulo'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['que_incluye']->renderLabel() ?></th>
            <td>
                <?php echo $form['que_incluye']->renderError() ?>
                <?php echo $form['que_incluye'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['condiciones']->renderLabel() ?></th>
            <td>
                <?php echo $form['condiciones']->renderError() ?>
                <?php echo $form['condiciones'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['descripcion']->renderLabel() ?></th>
            <td>
                <?php echo $form['descripcion']->renderError() ?>
                <?php echo $form['descripcion'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['precio']->renderLabel() ?></th>
            <td>
                <?php echo $form['precio']->renderError() ?>
                <?php echo $form['precio'] ?>
            </td>
        </tr>        
    </tbody>
</table>