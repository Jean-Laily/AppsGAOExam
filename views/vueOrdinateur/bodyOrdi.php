<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Gestion Ordinateur</h1>
            <br>
            <?php if(isset($pConfirm) && $pConfirm == 21): ?>
                <div class="col alert alert-success alert-dismissible fade show" role="alert">
                    <p><strong> Le poste a bien été crée ! </strong></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif(isset($pConfirm) && $pConfirm == 22): ?>
                <div class="col alert alert-success alert-dismissible fade show" role="alert">
                    <p><strong> Le poste a bien été modifié ! </strong></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif(isset($pConfirm) && $pConfirm == 23): ?>
                <div class="col alert alert-success alert-dismissible fade show" role="alert">
                    <p><strong> Le poste a bien été supprimé ! </strong></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif?> 
            <div class="card card-waves ">
                <div class="card-header">
                    Liste des postes existants
                </div>
                <div class="card-body">
                    <p class="font-weight-bold">
                        <a href="index.php?act=crO&req=create" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Ajouter Pc</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nom du poste</th>
                                    <th>Statuts</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody> <!-- a transformer en tableau dynamique dès que possible-->
                            <?php 
                                $aucunPostOK = true;
                                //parcourt l'ensemble du tableau attr
                                foreach($tabOrdiOk as $values){
                                    if(!empty($tabOrdiOk)){
                                        echo' <tr>
                                                <td>'.$values['nomPc'].'</td>                                                
                                                <td>'.$values['etatPc'].'</td>
                                                <td class="text-center">
                                                    <a href="index.php?act=crO&req=update1&num='.$values['numPoste'].'" class="pr-2"><i class="fas fa-edit fa-2x" style="color:orange"></i></a> 
                                                    <a data-delete-url="index.php?act=odt&req=delete&num='.$values['numPoste'].'" class="pl-2" type="button" data-toggle="modal" data-target="#modalSuppr"><i class="fas fa-trash-alt fa-2x" style="color:Tomato"></i></a>
                                                </td>
                                            </tr>';

                                        $aucunPostOK = false;
                                    }
                                } 
                                if($aucunPostOK){
                                    echo '<td colspan="3" class="text-center"><strong>Aucun poste n\'a été crée actuellement!</strong></td>';
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="card card-waves ">
                <div class="card-header">
                    Liste des postes existants en maintenance
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nom du poste</th>
                                    <th>Statuts</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $aucunPostKO = true;
                                //parcourt l'ensemble du tableau ordi
                                foreach($tabOrdiKo as $values){
                                    if(!empty($tabOrdiKo)){
                                    echo' 
                                        <tr>
                                            <td>'.$values['nomPc'].'</td>                                                
                                            <td>'.$values['etatPc'].'</td>
                                            <td class="text-center">
                                                <a href="index.php?act=crO&req=update2&num='.$values['numPoste'].'" class="pr-2"><i class="fas fa-edit fa-2x" style="color:orange"></i></a> 
                                                <a data-delete-url="index.php?act=odt&req=delete&num='.$values['numPoste'].'" class="pl-2" type="button" data-toggle="modal" data-target="#modalSuppr"><i class="fas fa-trash-alt fa-2x" style="color:Tomato"></i></a>
                                            </td>
                                        </tr>';

                                        $aucunPostKO = false;
                                    }
                                }
                                if($aucunPostKO){
                                    echo '<td colspan="3" class="text-center"><strong>Aucun poste n\'est en maintenance actuellement!</strong></td>';
                                }?>
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
                <p>Attention vous êtes sur le point de supprimer un poste!</p>
                <p>Etes-vous sur de vouloir le supprimer?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a id="validID" class="btn btn-primary" type="button">Supprimer</a>
            </div>
        </div>
    </div>
</div>