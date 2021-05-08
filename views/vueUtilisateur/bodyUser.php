<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Gestion Utilisateur</h1>
                        <br>
                        <div class="card card-waves ">
                            <div class="card-header">
                                Liste des utilisateurs existants
                            </div>
                        <div class="card-body">
                            <p class="font-weight-bold">
                                <a href="index.php?act=crU&req=create" type="button" class="btn btn-success"><i class="fas fa-user-plus" ></i> Ajouter</a>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Adresse</th>
                                            <th>Code postal</th>
                                            <th>Ville</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php 
                                        //parcourt l'ensemble du tableau attr
                                        foreach($tabUser as $values){
                                            echo'<tr>
                                                    <td>'.$values['nomUtil'].'</td>                                                
                                                    <td>'.$values['prenomUtil'].'</td>
                                                    <td>'.$values['adresse'].'</td>
                                                    <td>'.$values['codeP'].'</td>
                                                    <td>'.$values['ville'].'</td>
                                                    <td class="text-center">
                                                        <a href="index.php?act=crU&req=update&num='.$values['numUtil'].' " class="pr-2"><i class="fas fa-edit fa-2x" style="color:orange"></i></a> 
                                                        <a data-delete-url="index.php?act=utl&req=delete&num='.$values['numUtil'].' " class="pl-2" type="button" data-toggle="modal" data-target="#modalSuppr" ><i class="fas fa-trash-alt fa-2x" style="color:Tomato"></i></a>
                                                    </td>
                                                </tr>';
                                        }
                                    ?>
                                    </tbody>
                                </table>
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
                <p>Attention vous êtes sur le point de supprimer un utilisateur!</p>
                <p>Etes-vous sur de vouloir le supprimer?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a id="validID" class="btn btn-primary" type="button">Supprimer</a>
            </div>
        </div>
    </div>
</div>