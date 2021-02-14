<table>
    <form action="<?php echo $tab."R.php";?>" method="POST">
        <tr> <th class="text-center" colspan="<?php echo pg_num_fields($data_query)?>">ORDINA PER:</th> </tr>
        <tr>
            <?php foreach ($col_name as $col){ ?>
                <td class="text-center">
                    <label for="<?php echo htmlspecialchars($col)?>"><?php echo htmlspecialchars(strtoupper(str_replace("_", ". ", $col))) ?></label>
                    <select name="<?php echo htmlspecialchars($col)?>">
                        <option value="">...</option>
                        <option value="ASC">A-Z</option>
                        <option value="DESC">Z-A</option>
                    </select></td>
            <?php }?>
            <td colspan="2">
                <input type="submit" value="Filtra">
            </td>
        </tr>

    </form>

</table>
