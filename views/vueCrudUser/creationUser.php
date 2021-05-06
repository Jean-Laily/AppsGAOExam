            <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-bold my-4">Création d'un utilisateur</h3></div>
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
                                            <button class="btn btn-primary" type="submit">Créer l'utilisateur</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>