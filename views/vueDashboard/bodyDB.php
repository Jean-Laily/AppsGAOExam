
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Gestion Attribution</h1>
            <br>
            <?php if(isset($pConfirm) && $pConfirm == 11): ?>
                <div class="col alert alert-success alert-dismissible fade show" role="alert">
                    <p><strong> La réservation a bien été crée ! </strong></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif(isset($pConfirm) && $pConfirm == 13): ?>
                <div class="col alert alert-success alert-dismissible fade show" role="alert">
                    <p><strong> La réservation a bien été annulé! </strong></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>

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
                                    <th>Attribué</th>
                                    <th>Horaire</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                //formatter la date reçus par Mysql en version FR
                                $datefmt = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'dd MMMM yyyy');
                                //parcourt l'ensemble du tableau attr
                                foreach($tabAttr as $values){
                                    $date = date_create($values['dateJour']);
                                    
                                    echo' <tr>
                                            <td>'.$datefmt->format($date).'</td>                                                
                                            <td>'.$values['nomPc'].'</td>
                                            <td>'.$values['libelle'].'</td>
                                            <td>'.$values['nomUtil'].'</td>
                                            <td>'.$values['prenomUtil'].'</td>
                                            <td class="text-center">
                                                <a href="index.php?act=crA&req=update&num='.$values['numPoste'].'" class="pr-2 d-none"><i class="fas fa-edit fa-2x" style="color:orange"></i></a>
                                                <a data-delete-url="index.php?act=db&req=delete&numP='.$values['numPoste'].'&numC='.$values['numCreneau'].'&numU='.$values['numUtil'].'" class="pl-2" type="button" data-toggle="modal" data-target="#modalSuppr"><i class="far fa-window-close fa-2x" style="color:Tomato"></i></a>
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
                <p>Attention vous êtes sur le point d'annuler la réservation!</p>
                <p>Etes-vous sur de vouloir annuler?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Retour</button>
                <a id="validID" class="btn btn-primary" type="button">Annuler</a>
            </div>
        </div>
    </div>
</div>