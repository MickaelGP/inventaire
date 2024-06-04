<?php

use App\Aliments;
use App\Database;
use App\Modif;

$query = new Modif(Database::getPdo());
$resultat = $query->selectAllElements();

?>
 <?php if($resultat != false):?>
        <div class="contaire-fluid mt-5">
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
            <div class="container  alert alert-danger text-center mt-5">
                <h3>Pas d'élements dans la liste de course</h3>
            </div>
<?php endif;?>
