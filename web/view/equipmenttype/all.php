<?php
include '../../autoload.php';

$equipmentTypeController = new EquipmentTypeController();

$elements = $equipmentTypeController->getEquipmentTypes();

include '../include/error.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Equipment Types - Food Truck Management System</title>
    <?php include '../include/header.php';?>
</head>
<body><div class="container"><div class="col-xs-12">
    <h1>Equipment Types - Food Truck Management System</h1>
    <?php if (count($elements) == 0) { ?>
        <p>There is no equipment type yet</p>
    <?php } ?>
    <table class="table">
	    <thead>
		    <tr>
			    <th>Name</th>
			    <th></th>
			    <th></th>
		    </tr>
	    </thead>
	    <tbody>
        <?php foreach ($elements as $elementId => $element){ ?>
            <tr>
                <td><?= $element->getName() ?></td>
                <td><a href="edit.php?id=<?=$elementId?>">Edit</a></td>
                <td><a href="delete.php?id=<?=$elementId?>">Delete</a></td>
            </tr>
        <?php } ?>
	    </tbody>
    </table>
    <a href="create.php">Create a equipment type</a>
    <br>
    <a href="/index.php">Main Menu</a>
</div></div></body>
</html>
