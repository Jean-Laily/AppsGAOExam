        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                        <?php 
                        switch($pRequete){

                            case "create":
                        ?> <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                <?php if(isset($pErreur) && $pErreur == 21){
                                    echo '<p>Désoler le post est déjà réservé </p>';
                                } ?>
                                    <h3 class="text-center font-weight-bold my-4">Réservation d'un poste</h3>
                                </div>
                                <div class="card-body">
                                    <form action=" index.php?act=crA&req=create" method="post">
                                        <div class="form-group">
                                            <label for="nomPosteInfo">Nom Poste</label>
                                            <select name="nomPoste" class="form-control" id="nomPosteInfo">
                                                <?php foreach($tabPostOk as $values){ echo '<option>'.$values['nomPc'].'</option>';}?>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="nomPosteInfo">Utilisateur</label>
                                            <select name="utilisateurName" class="form-control" id="nomPosteInfo">
                                                <?php foreach($tabUser as $values){ echo '<option>'. $values['nomUtil'] .'</option>'; }?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="creneauHoraire">Creneau</label>
                                            <select name="creneauHr" class="form-control" id="creneauHoraire">
                                                <?php foreach($tabCreneau as $values){ echo '<option>'.$values['libelle'] .'</option>'; }?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="choixDate">Date</label>
                                            <input class="form-control py-4" name="dateChoisi" id="choixDate" type="date" required />
                                        </div>
                                        
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                            <a href="index.php?act=db" class="btn btn-success" type="button">Retour</a>
                                            <button class="btn btn-primary" type="submit">Créer la réservation</button>
                                        </div>
                                    </form>
                                </div>
                            </div>   
                    <?php   break;

                            case "update":
                                $tabUserId;
                                foreach($tabUserId as $valeur){
                            ?>  <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-bold my-4">Modification d'un utilisateur</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action=" index.php?act=crU&req=update" method="post">
                                            <div class="form-group">
                                                <input class="form-control py-4 d-none" name="idUser" type="text" value=" <?php echo $valeur['numUtil'] ?> " />
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1 font-weight-bold" for="nomUtilisateur">Nom</label>
                                                <input class="form-control py-4" name="nomUser" id="nomUtilisateur" type="text" value=" <?php echo $valeur['nomUtil'] ?> " required />
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1 font-weight-bold" for="prenomUtilisateur">Prénom</label>
                                                <input class="form-control py-4" name="prenomUser" id="prenomUtilisateur" type="text" value="<?php echo $valeur['prenomUtil'] ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1 font-weight-bold" for="adresseUtilisateur">Adresse</label>
                                                <input class="form-control py-4" name="adressUser" id="adresseUtilisateur" type="text" value="<?php echo $valeur['adresse'] ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1 font-weight-bold" for="codePUtilisateur">Code Postal</label>
                                                <input class="form-control py-4" name="cpUser" id="codePUtilisateur" type="text" value="<?php echo $valeur['codeP'] ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1 font-weight-bold" for="villeUtilisateur">Ville</label>
                                                <input class="form-control py-4" name="citieUser" id="villeUtilisateur" type="text" value="<?php echo $valeur['ville'] ?>" required />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                                <a href="index.php?act=db" class="btn btn-success" type="button">Retour</a>
                                                <button class="btn btn-primary" type="submit">Sauvegarder</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>                        
                        <?php }   
                        break; }?>
                        </div>
                    </div>
                </div>
            </main>
            <br>

            