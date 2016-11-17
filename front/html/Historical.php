<body>
    <?php
    $title = "Historique";
    include '../../fragments/header.php';
    ?>
    <main>
        <div class="contain row card horizontal">
            </br>
            <h3 class="center">Historique</h3>
            <table class="">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Conducteur</th>
                        <th>Lieu</th>
                        <th>Détail</th>
                    </tr>
                </thead>
                <tbody>
                <td>18/11/2016</td>
                <td>Roussel Maxime</td>
                <td>Macdonalds</td>
                <td>
                    <a  class="btn-floating btn-large waves-effect waves-light blue-grey detail"><i class="material-icons">add</i></a>
                </td>
                </tr>
                </tbody>

            </table>
            </br>
        </div>

    </main>
    <?php
    include '../../fragments/footer.php';
    ?>
    <div id="modalhistorique" class="modal">
        <div class="row">
            <div class="modal-content">
                <h4>Detail rendez-vous</h4><hr>
                <div class="transparence col s12 z-depth-4 card-panel">
                    <form>
                        <div class="row">
                        </div>

                        <ul id="profile-page-about-details" class="collection z-depth-1">
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="mdi-action-wallet-travel"></i> Nom du conducteur</div>
                                    <div class="col s7 grey-text text-darken-4 right-align">
                                        <?php
                                        echo "Maxime Roussel";
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="mdi-social-poll"></i>Lieu</div>
                                    <div class="col s7 grey-text text-darken-4 right-align">
                                        <?php
                                        echo "Macdonalds Beaurain";
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="mdi-social-domain"></i>Date</div>
                                    <div class="col s7 grey-text text-darken-4 right-align"> <?php
                                        echo "16/08/2016";
                                        ?></div>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i>Note</div>
                                    <div class="col s7 grey-text text-darken-4 right-align"> <?php
                                        echo '<div class="input-field ">
                                                      <input id="icon_prefix" type="text" class="validate">
                                                      <label for="icon_prefix">Note sur 5</label>
                                                   </div>';
                                        ?></div>
                                </div>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="input-field col s12" >
                                <a id="note" class="btn waves-effect waves-light col s12">Valider la note</a>
                                <a class="modal-action modal-close btn waves-effect waves-light col s12  closeModal">Annuler</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>
</body>
</html>
