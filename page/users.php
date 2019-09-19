<!-- Table display -->

<table class="table table-bordered">
    <thead>
    <tr>
        <th class="lp-col">l.p.</th>
        <td>Imię</td>
        <td>Miasto</td>
        <td>E-mail</td>
        <td>Data rejestracji</td>
    </tr>
    </thead>

    <tbody>
    <?php
    use Mozesz\MozeszNamespace\DbConnect;

    $db = new DbConnect();
    $query = "SELECT * FROM `user` WHERE `is_Active` = 1";
    $con = $db->openConnection();
    $rows = $con->prepare($query);
    $rows->execute();
    $db->closeConnection();
    $lp = 0;
    while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
        $lp++;
        echo
        "<tr>
                            <th scope=\"row\">$lp</th>
                            <td>".$row['name']."</td>
                            <td>".$row['city']."</td>
                            <td class=\"email-row\">".$row['mail']."</td>
                            <td>".$row['date']."</td>
                        </tr>
                            ";
    }
    ob_end_flush();
    ?>

    </tbody>
</table>
<!--End of displaying users-->