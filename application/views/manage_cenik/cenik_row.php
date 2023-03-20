<tr id="row-<?php echo $row['id']?>"> 
    <td class="modelId"><?php echo $row['id']?></td>
    <td class="modelSluzba"><?php echo $row['sluzba']?></td>
    <td class="modelCena"><?php echo $row['cena']?></td>
    <td class="modelDelka_foceni"><?php echo $row['delka_foceni']?></td>
    <td>
        <a href="javascript:void(0);" onclick="showEditForm(<?php echo $row['id']?>);" class="btn btn-primary">Uprvavit</a>
    </td>
    <td>
        <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDeleteModel(<?php echo $row['id']?>);">Smazat</a>
    </td>
</tr>