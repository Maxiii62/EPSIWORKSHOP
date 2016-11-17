
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

        <div id="right-panel"></div>
        <div id="map"></div>

        <div class=" row card">
            <div class="row">
                <select class="browser-default select" id="selectLesLieux"></select>
                <input id="heureRDV" type="text" class="validate">
                <input id="dateRDV" type="date" class="datepicker">
                <button class="btn waves-effect waves-light blue" id="searchRdv" type="button" name="goto">Rechercher
                    <i class="material-icons right">search</i>
                </button>
            </div>
            <div class="">
                <table class="">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Conducteur</th>
                            <th>Lieu</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td>18/11/2016</td>
                            <td>Roussel Maxime</td>
                            <td>Macdonalds</td>
                            <td><input type="button" class="participer" value="participer"/></td>
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
                    <div class="switch">
                        <label>
                            Non
                            <input type="checkbox">
                            <span class="lever"></span>
                            Oui
                        </label>
                    </div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix">perm_contact_calendar</i>
                        <input id="dateRDV" type="date" class="datepicker">
                        <label for="icon_prefix">Date</label>
                    </div>
                    <div class="input-field col s10">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-green btn-flat closeModal">Annuler</a>
            </div>
        </div>

</body>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgaxtdS0y_Mwk-ennUmyB9mHlpQbBGHLg&libraries=places&callback=initMap" async defer></script>
<script src="../js/google.js" />

<script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

</script>
<script>
    initLieuxSelect();
    initMap();
    $('#mode').material_select();
</script>
</html>
