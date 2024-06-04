<?php
$titel = "Ajout Inventaire";
use App\Database;
use App\AjoutElement;
use App\HTML\Form;
$form = new Form;
if(isset($_POST["ajouter"])){
    if(!empty($_POST["element"]) && !empty($_POST["quantites"])){
        $elements = htmlentities($_POST['element']);
        $quantites = htmlentities($_POST['quantites']);
        $date = htmlentities($_POST['date']);
        $query = new AjoutElement(Database::getPdo());
        $query->ajout($elements, $quantites,$date);
    }else{
        $err = "Vous devez remplir au minimun le champ elements et quantites";
    }
}
?>

<div class="text-center container mt-3">
    <h1>Ajouter des articles au Stock</h1>
</div>

<div class="container mt-5 w-50">
    <form action="" method="post">
        <?= $form->input("text","element","Elements");?>
        <?= $form->input("number","quantites","Quantites");?>
        <?= $form->input("date","date","Dates de peremption");?>
        <?= $form->boutton("submit","ajouter","Ajouter");?>
    </form>
</div>

<?php if(isset($err)):?>
    <div class="container text-center mt-3 w-50 alert alert-danger">
        <h3><?=$err?></h3>
    </div>
<?php endif;?>