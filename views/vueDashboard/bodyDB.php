
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Gestion Attribution</h1>
                        <br>
                        <div class="card card-waves ">
                            <div class="card-header">
                                Liste d'attribution des postes
                            </div>
                            <div class="card-body">
                                <p class="font-weight-bold " >
                                    <a href="index.php?act=crA&req=create" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Attribuer</a>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Horaire</th>
                                                <th>Attribué</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> <!-- a transformer en tableau dynamique dès que possible -->
                                            <?php 
                                            //formatter la date reçus par Mysql en version FR
                                            $datefmt = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'dd MMMM yyyy');
                                            //parcourt l'ensemble du tableau attr
                                            foreach($tabAttr as $values){
                                                $date = date_create($values['dateJour']);
                                                
                                                echo' <tr>
                                                        <td>'.$datefmt->format($date).'</td>                                                
                                                        <td>'.$values['libelle'].'</td>
                                                        <td>'.$values['nomPc'].'</td>
                                                        <td>'.$values['nomUtil'].'</td>
                                                        <td>'.$values['prenomUtil'].'</td>
                                                        <td class="text-center">
                                                            <a href="index.php?act=crA&req=update&num='.$values['numPoste'].'" class="pr-2"><i class="fas fa-edit fa-2x" style="color:orange"></i></a>
                                                            <a data-delete-url="index.php?act=db&req=delete&num='.$values['numPoste'].'" class="pl-2" type="button" data-toggle="modal" data-target="#modalSuppr"><i class="fas fa-trash-alt fa-2x" style="color:Tomato"></i></a>
                                                        </td>
                                                    </tr>';
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<!-- ************************  PARTIE SUPPRESSION VIA MODAL *************************** -->
<div class="modal fade" id="modalSuppr" tabindex="-1" role="dialog" aria-labelledby="modalSupprLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSupprLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Attention vous êtes sur le point de annuler la réservation!</p>
                <p>Etes-vous sur de vouloir annuler?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Retour</button>
                <a id="validID" class="btn btn-primary" type="button">Annuler</a>
            </div>
        </div>
    </div>
</div>