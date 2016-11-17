<body>
<?php

$title = "Prendre Rendez vous";
include '../../fragments/header.php';
?>
    <main>
<div id="login-page">
    <h3>Classement</h3>
<table id="tab_classement" class="trietable dataTable card ">
    <thead>
        <tr>
            <th>Position</th>
            <th>Nom</th>
            <th>Points</th>
        </tr>
    </thead>

    <tbody id="tbody" role="alert" aria-live="polite" aria-relevant="all">

    </tbody>
</table>
</div>
    </main>
<?php
include '../../fragments/footer.php';
?>
</body>
<script>
    classement();
</script>
