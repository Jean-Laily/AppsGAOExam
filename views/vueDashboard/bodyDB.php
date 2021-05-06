
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Gestion Attribution</h1>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Liste d'attribution des postes
                            </div>
                            <div class="card-body">
                                <div class="float-right" >
                                    <p class="font-weight-bold">Ajouter
                                        <a href="#" style="font-size: 0.5rem;">
                                            <i class="fas fa-plus-square fa-5x" style="color:green"></i>
                                        </a>
                                    </p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Horaire</th>
                                                <th>Attribué</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> <!-- a transformer en tableau dynamique dès que possible -->
                                            <?php $tabAttr;
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
                                                        <td class="text-center"><a href="#"><i class="fas fa-edit fa-2x" style="color:orange"></i></a> <a href="#" class=""><i class="fas fa-trash-alt fa-2x" style="color:Tomato"></i></a></td>
                                                    </tr>';
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>