
<body>
    <?php
    $title = "Prendre Rendez vous";
    include '../../fragments/header.php';
    ?>
    <main>

        <div id="type-selector" class="controls">
            <input type="radio" name="mode" id="changetype-all" value="DRIVING" checked="checked">
            <label for="changetype-all" style="color:white;">Voiture</label>

            <input type="radio" name="mode" id="changetype-establishment" value="WALKING">
            <label for="changetype-establishment" style="color:white;">Marche</label>

            <input type="radio" name="mode" id="changetype-address" value="BICYCLING">
            <label for="changetype-address" style="color:white;">Vélo</label>

            <input type="radio" name="mode" id="changetype-geocode" value="TRANSIT">
            <label for="changetype-geocode" style="color:white;">Transport en commun</label>
        </div>
        <div id="div_map" class="row ">
            <div  class="col s3 push-s9 black white-text">
                <h3>Itinéraire</h3>
                <div id="right-panel" ></div>
            </div>
            <div  class="col s9 pull-s3 white">
                <h3>Carte</h3>
                <div id="map" ></div>
            </div>
        </div>

        <div class=" row card">
            <div class="row">
                <select class="browser-default select" id="selectLesLieux"></select>
                <select class="browser-default select" id="horaireRDV">
									<option value="" disabled selected>Horaire souhaité</option>
									<option value="11h30">11h30</option>
									<option value="11h45">11h45</option>
									<option value="12h00">12h00</option>
									<option value="12h15">12h15</option>
									<option value="12h30">12h30</option>
									<option value="12h45">12h45</option>
									<option value="13h00">13h00</option>
									<option value="13h15">13h15</option>
									<option value="13h30">13h30</option>
									<option value="13h45">13h45</option>
									<option value="14h00">14h00</option>
								</select>
                <input id="dateRDV" type="date" class="datepicker">
                <button class="btn waves-effect waves-light blue" id="searchRdv" type="button" name="goto">Rechercher
                    <i class="material-icons right">search</i>
                </button>
            </div>
            <div class="">
                <table class="" >
                    <thead>
                        <tr>
                            <th>Conducteur</th>
                            <th>horaire</th>
                            <th>Place(s) restantes</th>
                            <th>Position initiale</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="lesRdv">
                        <tr >
                            <td colspan="4">Veuillez chercher des rdv</td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </main>
    <?php
    include '../../fragments/footer.php';
    ?>
    <div id="modalParticiper" class="modal">
        <div class="row">
            <div class="modal-content">
                <h4>Rejoindre un rendez-vous</h4><hr>
                <div class="row">
                    <div class="switch" >
                        <span>J'y vais directement ?</span>
                        <label>
                            Non
                            <input type="checkbox" id="switchDirect" checked>
                            <span class="lever"></span>
                            Oui
                        </label>
                    </div>
                    <div class="input-field col s10 hide" id="prendsMoiEndroit">
                        <label for="icon_prefix">Lieu où le conducteur va me prendre :</label>

                        <!-- <input id="endroitConducteurPrendre" class="controls" type="text"
                                          placeholder="Indiquez un lieu"> -->

                        <style>

                            .pac-container {
                                z-index: 1051 !important;
                            }
                        </style>
                        <input id="endroitConducteurPrendre" class="controls" type="text"
                               placeholder="Indiquez un lieu">

                    </div>
                    <div class="input-field col s10">
                        <button class="btn waves-effect waves-light" id="joinRdv" type="submit" name="action">JOINDRE
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-green btn-flat closeModal">Annuler</a>
            </div>

        </div>
    </div>
</body>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgaxtdS0y_Mwk-ennUmyB9mHlpQbBGHLg&libraries=places&callback=initMapAppointements" async defer></script>
<script src="../js/google.js" />

<script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

</script>
<script>
    $('#endroitConducteurPrendre').on('')
    initLieuxSelect();
    initMap();
    $('#mode').material_select();
</script>
</html>
