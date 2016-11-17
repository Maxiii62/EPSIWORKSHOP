<body>
    <?php
    $title = "Classement";
    include '../../fragments/header.php';
    ?>
    <main>
        <div id="login-page" class="card">
            <div class="transparence">
                </br>
                <h3 class="center">Classement</h3>
            <table id="tab_classement" class="">
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
        </div>
    </main>
    <?php
    include '../../fragments/footer.php';
    ?>
</body>
<script>
    classement();
</script>
