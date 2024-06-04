<?php
$titel = "Recherche";
use App\HTML\Form;
use App\Recherche;
use App\Database;
$form = new Form;

if(isset($_POST["search"]) && isset($_POST["search_aliment"])){
    $bd = new Recherche(Database::getPdo());
    $resultat = $bd->rechercheInventaire($_POST["search_aliment"]);
}
?>
<div class="container w-50 mt-5 text-center">
        <h1 class="text-center mt-2"> Rechercher un aliment </h1>
        <form action="" method="post">
        <?=$form->input("search","search_aliment","Search");?>
        <button type="submit" id="showMe" name="search" class="btn btn-primary mt-2">Rechercher</button>
        </form>
</div>

<?php if(isset($_POST["search"]) && !empty($_POST["search_aliment"])):?>
    <?php if($resultat):?>
        <div class="contaire-fluid ">
            <h1><?=count($resultat);?> resultat(s) trouvé(s)</h1>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Aliments</th>
                    <th scope="col">Quantites</th>
                    <th scope="col">Date de péremption</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($resultat);$i++):?>
                                <tr>
                                <td><?=$resultat[$i]['id'];?></td>
                                    <td><?=$resultat[$i]['aliments'];?></td>
                                    <td><?=$resultat[$i]['quantites'];?></td>
                                    <td><?=$resultat[$i]['dates'];?></td>
                                    <td> <button type="button" class="btn btn-warning"><a href="<?=$router->url("modification",['id' => $resultat[$i]['id']])?>"><i class="fa-solid fa-pen-to-square"></i></a></button> </td>
                                </tr>
                <?php endfor;?>
                </tbody>
            </table>
        </div>
        <?php else:?>
            <div class="container w-50 alert alert-danger text-center mt-3">
                <h3>No Data Found</h3>
            </div>
    <?php endif;?>
<?php endif;?>
