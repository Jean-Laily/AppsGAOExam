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
                            <div class="float-right" >
                                <p class="font-weight-bold">
                                    <a href="index.php?act=crU&req=create">
                                        <i class="fas fa-user-plus fa-2x" style="color:green"></i>
                                    </a>
                                </p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Adresse</th>
                                            <th>Code postal</th>
                                            <th>Ville</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> <!-- a transformer en tableau dynamique dès que possible-->
                                    <?php $tabUser;
                                        //parcourt l'ensemble du tableau attr
                                        foreach($tabUser as $values){
                                            echo'<tr>
                                                    <td>'.$values['nomUtil'].'</td>                                                
                                                    <td>'.$values['prenomUtil'].'</td>
                                                    <td>'.$values['adresse'].'</td>
                                                    <td>'.$values['codeP'].'</td>
                                                    <td>'.$values['ville'].'</td>
                                                    <td class="text-center"><a href="index.php?act=crU&req=update"><i class="fas fa-edit fa-2x" style="color:orange"></i></a> <a href="index.php?act=crU&req=delete" class=""><i class="fas fa-trash-alt fa-2x" style="color:Tomato"></i></a></td>
                                                </tr>';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>