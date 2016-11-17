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
                <tbody id="tbody">

                </tbody>

            </table>
            </br>
        </div>

    </main>
    <?php
    include '../../fragments/footer.php';
    ?>

<script>

    getHistorique();

</script>

</body>
</html>
