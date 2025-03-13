
<?php
require_once "model/modelMedicament.php";
require_once "controller/medicamentController.php";

if (isset($_POST["action"]))
{
    if ($_POST["action"]=="add")
    {
        addPizza();
    }
    else
        if($_POST["action"] == "upd")
        {
            updPizza();
        }
    else
    {
        delPizza();
    }
}
getAllMedicaments();

?>