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
                                    <h3 class="text-center font-weight-bold my-4">Création d'un utilisateur</h3>
                                </div>
                                <div class="card-body">
                                    <form action=" index.php?act=crU&req=create" method="post">
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="nomUtilisateur">Nom</label>
                                            <input class="form-control py-4" name="nomUser" id="nomUtilisateur" type="text" placeholder="Entrer le nom de l'utilisateur" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="prenomUtilisateur">Prénom</label>
                                            <input class="form-control py-4" name="prenomUser" id="prenomUtilisateur" type="text" placeholder="Entrer le prénom de l'utilisateur" required />
                                        </div>
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="adresseUtilisateur">Adresse</label>
                                            <input class="form-control py-4" name="adressUser" id="adresseUtilisateur" type="text" placeholder="Entrer l'adresse de l'utilisateur" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="codePUtilisateur">Code Postal</label>
                                            <input class="form-control py-4" name="cpUser" id="codePUtilisateur" type="text" placeholder="Entrer le code postal de l'utilisateur" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="villeUtilisateur">Ville</label>
                                            <input class="form-control py-4" name="citieUser" id="villeUtilisateur" type="text" placeholder="Entrer la ville de l'utilisateur" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="emailUtilisateur">Email</label>
                                            <input class="form-control py-4" name="mailUser" id="emailUtilisateur" type="email" placeholder="Entrer l'email de l'utilisateur" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="mdpUtilisateur">Mot de passe</label>
                                            <input class="form-control py-4" name="passUser" id="mdpUtilisateur" type="password" placeholder="Entrer un mot de passe " required/>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                            <a href="index.php?act=utl" class="btn btn-success" type="button">Retour</a>
                                            <button class="btn btn-primary" type="submit">Créer l'utilisateur</button>
                                        </div>
                                    </form> 
                        <?php   break;

                            case "update":
                                $tabUserId;
                                foreach($tabUserId as $valeur){
                        ?> <div class="card shadow-lg border-0 rounded-lg mt-5">
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
                                            <a href="index.php?act=utl" class="btn btn-success" type="button">Retour</a>
                                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-body">
                                    <form action=" index.php?act=crU&req=update" method="post">
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="emailUtilisateur">Email</label>
                                            <input class="form-control py-4" name="mailUser" id="emailUtilisateur" type="email" value="<?php echo $valeur['email'] ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="mdpUtilisateur">Mot de passe</label>
                                            <input class="form-control py-4" name="passUser" id="mdpUtilisateur" type="password" value="<?php echo $valeur['passW'] ?>" required />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                            <a href="index.php?act=utl" class="btn btn-success back" type="button">Retour</a>
                                            <button class="btn btn-primary" type="submit">Enregistrer</button>
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

            