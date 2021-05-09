<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <?php
                switch($pRequete){
                    case "create": ?>
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-bold my-4">Création d'un poste</h3>
                            </div>
                            <div class="card-body">
                                <form action=" index.php?act=crO&req=create" method="post">
                                    <div class="form-group">
                                        <label class="large mb-1 font-weight-bold" for="posteName">Nom</label>
                                        <input class="form-control py-4" name="nomPoste" id="posteName" type="text" placeholder="Entrer le nom du poste" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="etatPC">Selectionner le statut</label>
                                        <select name="etatPoste" class="form-control" id="etatPC" required>
                                            <option> </option>
                                            <option>Opérationnel</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                        <a href="index.php?act=odt" class="btn btn-success" type="button">Retour</a>
                                        <button class="btn btn-primary" type="submit">Créer poste</button>
                                    </div>
                                </form> 
            <?php   break;
                    case "update1":
                        foreach($tabOrdiIdOk as $valeur){?>
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-bold my-4">Modification d'un poste</h3>
                                </div>
                                <div class="card-body">
                                    <form action=" index.php?act=crO&req=update1" method="post">
                                    <div class="form-group">
                                        <input class="form-control py-4 d-none" name="idPoste" type="text" value=" <?php echo $valeur['numPoste'] ?> " />
                                    </div>
                                    <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="posteName">Nom</label>
                                            <input class="form-control py-4" name="nomPoste" id="posteName" type="text" value="<?php echo $valeur['nomPc'] ?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="etatPC">Selectionner le statut</label>
                                            <select name="etatPoste" class="form-control" id="etatPC" required>
                                                <option><?php echo $valeur['etatPc'] ?></option>
                                                <?php
                                                if($valeur['etatPc'] == "Opérationnel"){
                                                    echo '<option>Maintenance</option>';
                                                }else{
                                                    echo '<option>Opérationnel</option>';
                                                }?>
                                            </select>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                            <a href="index.php?act=odt" class="btn btn-success" type="button">Retour</a>
                                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                <?php  }  
                    break; 
                    case "update2":
                        foreach($tabOrdiIdKo as $valeur){ ?> 
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-bold my-4">Modification d'un poste</h3>
                                </div>
                                <div class="card-body">
                                    <form action=" index.php?act=crO&req=update2" method="post">
                                    <div class="form-group">
                                        <input class="form-control py-4 d-none" name="idPoste" type="text" value=" <?php echo $valeur['numPoste'] ?> " />
                                    </div>
                                    <div class="form-group">
                                            <label class="large mb-1 font-weight-bold" for="posteName">Nom</label>
                                            <input class="form-control py-4" name="nomPoste" id="posteName" type="text" value="<?php echo $valeur['nomPc'] ?>" readOnly />
                                        </div>
                                        <div class="form-group">
                                            <label for="etatPC">Selectionner le statut</label>
                                            <select name="etatPoste" class="form-control" id="etatPC" required>
                                                <option><?php echo $valeur['etatPc'] ?></option>
                                                <?php
                                                if($valeur['etatPc'] == "Maintenance"){
                                                    echo '<option>Opérationnel</option>';
                                                }else{
                                                    echo '<option>Maintenance</option>';
                                                }?>
                                            </select>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                            <a href="index.php?act=odt" class="btn btn-success" type="button">Retour</a>
                                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                <?php  }  
                    break; 
                } ?>
                </div>
            </div>
        </div>
    </main>
    <br>

            