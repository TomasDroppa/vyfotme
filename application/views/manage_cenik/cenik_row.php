<tr id="row-<?php echo $row['id']?>"> 
    <td class="modelId"><?php echo $row['id']?></td>
    <td class="modelService"><?php echo $row['service']?></td>
    <td class="modelPrice"><?php echo $row['price']?></td>
    <td class="modelPhotography_length"><?php echo $row['photography_length']?></td>
    <td>
        <a href="javascript:void(0);" onclick="showEditForm(<?php echo $row['id']?>);" class="btn btn-primary">Upravit</a>
    </td>
    <td>
        <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDeleteModel(<?php echo $row['id']?>);">Smazat</a>
    </td>
</tr>