<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <?php if (isset($pRequete) && $pRequete == "create"): ?>
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-bold my-4">Réservation d'un poste</h3>
                        </div>
                        <div class="card-body">
                            <form action=" index.php?act=crA&req=create" method="post">
                                <div class="msgErreur">
                                <?php if (isset($pErreur) && $pErreur == 101): ?>
                                    <p><strong> Erreur le poste et le créneau choisi est déjà réservé par un utilisateur ! </strong></p>
                                <?php endif ?> 
                                </div>
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
                <?php endif ?> 
                </div>
            </div>
        </div>
    </main>
    <br>

            