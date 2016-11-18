<body>
    <?php
    $title = "Historique";
    include '../../fragments/header.php';
    ?>
    <main >
        <div id="login-page" class="card transparence">
            <div class="transparence">
                 </br>
                <input type='hidden' id='idRdv'>

                <div class=" row horizontal">
                   
                    <h3 class="center">Mon Historique</h3>
                    <table class="">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Conducteur</th>
                                <th>Lieu</th>
                                <th>Détail</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                    </br>
                </div>
            </div>
        </div>
    </main>


    <div id="modalhistorique" class="modal">
        <div class="row">
            <div class="modal-content">
                <h4>Detail rendez-vous</h4><hr>
                <div class="transparence col s12 z-depth-4 card-panel">
                    <form>
                        <div class="row">
                        </div>

                        <table id="tab_classement" class="trietable dataTable card responsive-table ">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Note</th>
                            </tr>
                            </thead>

                            <tbody id="tbodyNotation" role="alert" aria-live="polite" aria-relevant="all">

                            </tbody>
                        </table>

                        <ul id="profile-page-about-details" class="collection z-depth-1">
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i>Description</div>
                                    <div class="col s7 grey-text text-darken-4 right-align"> <?php
                                        echo '<div class="input-field ">
                                                      <input id="addDescription" type="text" class="validate">
                                                      <label for="icon_prefix">Description</label>
                                                   </div>';
                                        ?></div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i>Note</div>
                                    <div class="col s7 grey-text text-darken-4 right-align"> <?php
                                        echo '<div class="input-field ">
                                                      <input id="addNote" type="text" class="validate">
                                                      <label for="icon_prefix">Note sur 5</label>
                                                   </div>';
                                        ?></div>
                                </div>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="input-field col s12" >
                                <a id="ajouterNote" class="btn waves-effect waves-light col s12">Ajouter</a>
                                <a id="annulerNote" class="modal-action modal-close btn waves-effect waves-light col s12  closeModal">Annuler</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
<?php
include '../../fragments/footer.php';
?>
<script>

    $("#annulerNote").on('click', function (){
        document.location.href = "../html/Historical.php";
    });

    getHistorique();

</script>