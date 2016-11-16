$('#valider').click(function() {
    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'utilisateur', 'action' : 'addUser','prenom': $('#first_name').val(), 'nom': $('#last_name').val(), 'password': $('#password').val(), 'email': $('#email').val(), 'datepicker_register': $('#datepicker_register').val(), 'numeroTelephone' : $('#telephone').val()},
        success: function (response) {
            if (response == "You are not allowed to access to this page."){
                Materialize.toast('Tous les champs doivent etre renseignes.', 4000);
            }else{
                document.location.href="../html/Login.php";
            }
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
                Materialize.toast('Utilisateur inconnu.', 4000);
            } else {
                document.location.href="../html/Appointements.php"
            }
        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problème rencontré dans le réseau.');
        }
    });
});

$('#deconnexion').click(function(){
    document.location.href="../html/Logout.php"
})

$('#modifierProfil').click(function(){
    document.location.href = "../html/Modification.php";
})

$('#modifier').click(function(){
    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'utilisateur', 'action' : 'updateUser', 'id':$('#id').val(), 'prenom': $('#first_name').val(), 'nom': $('#last_name').val(), 'password': $('#password').val(), 'email': $('#email').val(), 'datepicker_register': $('#datepicker_register').val(), 'numeroTelephone' : $('#telephone').val()},
        success: function (response) {
            if (response == "You are not allowed to access to this page."){
                Materialize.toast('Tous les champs doivent etre renseignes.', 4000);
            }else {
                document.location.href = "../html/Mon_Profil.php";
            }
        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problème rencontré dans le réseau.');
        }
    });
})

$('#reset').click(function(){
    $('.reset').val('');
})

function classement(){
    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'utilisateur', 'action' : 'getClassement'},
        success: function (response) {
            var obj = jQuery.parseJSON(response);
            for(var i = 0; i < obj.length;i++){
                $("#tbody").append("<tr class='odd'><td> " + (i+1) + "</td>" +
                    "<td class='td-mc1'> " + obj[i].nom + ' ' + obj[i].prenom + "</td>" +
                    "<td class='td-mc1'> " + obj[i].nombrePoints + "</tr>");
            }


        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problème rencontré dans le réseau.');
        }
    });
}