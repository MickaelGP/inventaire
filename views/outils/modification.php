<?php
$titel = "Modifications";
use App\Database;
use App\Modif;
use App\Aliments;
use App\HTML\Form;


$co = new Modif(Database::getPdo());
$result = $co->selectById($params['id']);
$al = new Aliments;
$form = new Form;
if(isset($_POST["modifier"])){
    if(($_POST["quantites"]) >= 0){
        $query = new Modif(Database::getPdo());
        $query->modifById(htmlentities($params["id"]),htmlentities($_POST["quantites"]));
        header("Location:".$router->url("home"));
        exit();
    }else{
        $err = "Vous devez remplir le champ quantitées";
    }
}
if(isset($_POST["delete"])){
    $query = new Modif(Database::getPdo());
    $query->deleteElementByID($params["id"]); 
}
?>
<div class="container text-center mt-5">
    <h1>Article <?=$result->getAliments();?></h1>
</div>
<div class="container w-50 mt-3">
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Quantitées</label>
            <?=$form->input("number","quantites","{$result->getQuantites()}");?>
        </div>
       <!-- <div class="mb-3">
            <label class="form-label">Dates</label>
            <?=$form->input("text","dates","{$result->getDates()}");?>
        </div> -->
        <button type="submit" name="modifier" class="btn btn-warning">Modifier</button>
        <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
    </form>
</div>

<?php if(isset($err)):?>
    <div class="container w-50 text-center alert alert-danger mt-3">
        <h3><?=$err;?></h3>
    </div>
<?php endif;?>

<?php if(isset($_POST["delete"])):?>
    <div class="container  text-center alert alert-success mt-3">
        <h3>L'element <?=$result->getAliments()?> a bien ete Supprimer</h3>
    </div>
<?php endif;?>
