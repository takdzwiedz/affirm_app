<!-- Table display -->

<table class="table table-bordered">
    <thead>
    <tr>
        <th class="lp-col">l.p.</th>
        <td>Imie</td>
        <td>Miasto</td>
        <td>E-mail</td>
        <td>Data rejestracji</td>
    </tr>
    </thead>

    <tbody>
    <?php

    $connection = new DbConnect();
    $request = "SELECT * FROM `user` WHERE `is_Active` = 1";
    $result = $connection->db->query($request);
    $lp = 0;
    while ($row = $result->fetch_object()) {
        $lp++;
        echo
        "<tr>
                            <th scope=\"row\">$lp</th>
                            <td>$row->name</td>
                            <td>$row->city</td>
                            <td class=\"email-row\">$row->mail</td>
                            <td>$row->date</td>
                        </tr>
                            ";
    }
    ob_end_flush();
    ?>

    </tbody>
</table>
<!--End of displaying users-->