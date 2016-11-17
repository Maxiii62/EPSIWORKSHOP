</body>
<?php $title = "Inscription";
include '../../fragments/header.php';
?>
    <header>…</header>
    <main class="Site-content">…</main>

   

 <main class="Site-content">
<div id="login-page" class="row">
    <div class="transparence">
        <div id="Register_Container" class="row card horizontal">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate reset">
                        <label for="first_name"><i class="tiny material-icons">mode_edit</i> Prénom</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate reset">
                        <label for="last_name"><i class="tiny material-icons">mode_edit</i> Nom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate reset">
                        <label for="password"><i class="tiny material-icons">lock</i> Mot de passe</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate reset">
                        <label for="email"><i class="tiny material-icons">email</i> Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="telephone" type="text" class="validate reset">
                        <label for="telephone"><i class="tiny material-icons">phone</i> Téléphone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="datepicker_register" type="date" class="datepicker">
                        <label for="icon_prefix">Date</label>
                    </div>
                </div>
                <span><button class="btn waves-effect waves-light" type="button" id="valider" name="action">Valider</button></span>

                <button class="btn waves-effect waves-light" type="button reset" value="Reset!" id="reset" name="action">Effacer</button>
                </span>
                <a href="/epsiworkshop/front/html/Appointement.php"><button class="btn waves-effect waves-light" type="button" id="back" name="action">Retour</button></a>
                <br>
                <p></p>
            </form>
        </div>
    </div>
</div>
</main>

<script>  $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control monthselectYears: 15 // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
</script>

<?php include '../../fragments/footer.php'; ?>
</body>
</html>