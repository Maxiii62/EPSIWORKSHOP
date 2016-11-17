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
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="alert('la vous pourrais noter le rendez vous');"> 
                        <td>18/11/2016</td>
                        <td>Roussel Maxime</td>
                        <td>Macdonalds</td>
                    </tr>
                </tbody>

            </table>
            </br>
        </div>

    </main>
    <?php
    include '../../fragments/footer.php';
    ?>
</body>
</html>
