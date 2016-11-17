$('#valider').click(function() {

    var date = new Date($("#datepicker_register").val());

    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();

    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'utilisateur', 'action' : 'addUser','prenom': $('#first_name').val(), 'nom': $('#last_name').val(), 'password': $('#password').val(), 'email': $('#email').val(), 'datepicker_register': year + '-' + month + '-' + day, 'numeroTelephone' : $('#telephone').val()},
        success: function (response) {
            if (response == "You are not allowed to access to this page."){
                Materialize.toast('Tous les champs doivent etre renseignes.', 4000);
            }else{
                document.location.href="../html/Login.php";
            }
        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problï¿½me rencontrï¿½ dans le rï¿½seau.');
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
            console.log('Problï¿½me rencontrï¿½ dans le rï¿½seau.');
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

    var date = new Date($("#datepicker_register").val());

    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();

    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'utilisateur', 'action' : 'updateUser', 'id':$('#id').val(), 'prenom': $('#first_name').val(), 'nom': $('#last_name').val(), 'password': $('#password').val(), 'email': $('#email').val(), 'datepicker_register': year + '-' + month + '-' + day, 'numeroTelephone' : $('#telephone').val()},
        success: function (response) {
            if (response == "You are not allowed to access to this page."){
                Materialize.toast('Tous les champs doivent etre renseignes.', 4000);
            }else {
                document.location.href = "../html/Mon_Profil.php";
            }
        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problï¿½me rencontrï¿½ dans le rï¿½seau.');
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
                    "<td class='td-mc1'> " + obj[i].nombrePoints + "</td></tr>");
            }


        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problï¿½me rencontrï¿½ dans le rï¿½seau.');
        }
    });
}

function getHistorique(){
    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'rdv', 'action' : 'getMine', 'idUser' : $('#id').val()},
        success: function (response) {

            var obj = jQuery.parseJSON(response);
            for(var i = 0; i < obj.length;i++){
                $("#tbody").append("<tr class='odd'><td> " + obj[i].dateRdv + "</td>" +
                    "<td class='td-mc1'> " + obj[i].nom + ' ' + obj[i].prenom + "</td>" +
                    "<td class='td-mc1'> " + obj[i].nomLieu + "</td><td>" +
                    "<a class='btn-floating btn-large waves-effect waves-light blue-grey detail' id='detail'  value=" + obj[i].idRdv +">" +
                    "<i class='material-icons'>add</i></></a></td></tr><script type='text/javascript' src='../../materialize/js/script.js'></script><script type='text/javascript' src='../../front/js/main.js'></script>");
            }

            $(".detail").on('click', function(){
                $id = $($(event.target).parent()).attr("value");

                $.ajax({
                    url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
                    type: 'POST',
                    async: false,
                    data: {'ws' : 'rdv', 'action' : 'getDetails', 'idRdv' : $id},
                    success: function (response) {

                        var obj = jQuery.parseJSON(response);
                        $('#idRdv').val($id);
                        for(var i = 0; i < obj.length;i++){
                            $("#tbodyNotation").append("<tr class='odd'><td class='td-mc1'> " + obj[i].nom + ' ' + obj[i].prenom + "</td>" +
                                "<td class='td-mc1'>" + obj[i].description + "</td><td class='td-mc1'> " + obj[i].note + "</td></tr>");
                        }
                    },
                    error: function (msg) {
                        console.log(msg.responseType);
                        console.log('Problï¿½me rencontrï¿½ dans le rï¿½seau.');
                    }
                });
            });

        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problï¿½me rencontrï¿½ dans le rï¿½seau.');
        }
    });
}


$('#ajouterNote').on('click', function(){
    $.ajax({
        url: "http://localhost/EPSIWORKSHOP/controller/controller.php?",
        type: 'POST',
        async: false,
        data: {'ws' : 'rdv', 'action' : 'addNote', 'idRdv' : $('#idRdv').val(), 'idUser' : $('#id').val(), 'note' : $('#addNote').val(), 'description' : $('#addDescription').val()},
        success: function (response) {

            Materialize.toast('Note ajoutée.', 4000);

            document.location.href = "../html/Historical.php";

        },
        error: function (msg) {
            console.log(msg.responseType);
            console.log('Problï¿½me rencontrï¿½ dans le rï¿½seau.');
        }
    });

});