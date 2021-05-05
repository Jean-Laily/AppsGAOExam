<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Se connecter</h3></div>
                                    <div class="card-body">
                                        <form action=" index.php?act=log" method="post">
                                            <div class="form-group">
                                                <label class="large mb-1 font-weight-bold" for="inputUsername">Nom utilisateur</label>
                                                <input class="form-control py-4" name="userID" id="inputUsername" type="text" placeholder="Entrer un nom d'utilisateur" />
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1 font-weight-bold" for="inputPassword">Mot de passe</label>
                                                <input class="form-control py-4" name="userPASS" id="inputPassword" type="password" placeholder="Entrer un mot de passe" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#">Mot de passe oublié?</a>
                                                <button class="btn btn-primary" type="submit">Connexion </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="#">Besoin d'un compte? Créer le!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
