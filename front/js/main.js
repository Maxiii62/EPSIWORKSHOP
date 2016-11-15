$('#sauvegarder').click(function() {
    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'utilisateur', 'action' : 'addUser','prenom': $('#first_name').val(), 'nom': $('#last_name').val(), 'password': $('#password').val(), 'email': $('#email').val(), 'datepicker_register': $('#datepicker_register').val(), 'numeroTelephone' : $('#telephone').val()},
        success: function (response) {
            alert(response);
        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problème rencontré dans le réseau.');
        }
    });
});

$('#connexion').click(function() {
    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'utilisateur', 'action' : 'verifUser','email': $('#email').val(), 'password': $('#password').val()},
        success: function (response) {
            response = JSON.parse(response);

            if(response.idUtilisateur == null){
                alert('Wrong');
            } else {
                document.location.href="../html/Appointement.php"
            }
        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problème rencontré dans le réseau.');
        }
    });
});
