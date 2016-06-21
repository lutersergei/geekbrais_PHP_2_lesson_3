<?php
require_once ('initial.php');
require_once ('database_connection.php');
require_once('model/wall.model.php');
require_once('model/realty.model.php');
if (isset($_GET['id']))
{
    $id=$_GET['id'];
}
else {
    header('Location:index.php');
}
if (isset($_POST['operation']))
{
    if ($_POST['operation']==='edit')
    {
        $rooms=$_POST['rooms'];
        $floor=$_POST['floor'];
        $adress=$_POST['adress'];
        $material=$_POST['material'];
        $area=$_POST['area'];
        $price=$_POST['price'];
        $description=$_POST['description'];
        $update=update_realty($rooms, $floor, $adress, $material, $area, $price, $description, $id);
        header("Location:index.php");
    }
}
if ($realty_information=get_realty_information($id))
{
    foreach ($realty_information as $realty_one)
    {
        $rooms=$realty_one['rooms'];
        $floor=$realty_one['floor'];
        $adress=$realty_one['adress'];
        $material=$realty_one['wall_id'];
        $area=$realty_one['area'];
        $price=$realty_one['price'];
        $description=$realty_one['description'];
    }
}
else {
    header('Location:index.php');
}
$walls=get_all_walls();
mysqli_close($link);
require 'views/edit.php';