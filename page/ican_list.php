<!-- Table display -->

<table class="table table-bordered">
    <thead>
    <tr>
        <th class="lp-col">l.p.</th>
        <td>Treść</td>
        <td class="per20">data</td>
        <td class="per20">godzina</td>
    </tr>
    </thead>

    <tbody>
    <?php

    $connection = new DbConnect();
    $request = "SELECT * FROM `affirmation` ORDER BY `affirmation`.`id_affirmation` DESC";
    $result = $connection->db->query($request);
    $lp = 0;
    while ($row = $result->fetch_object()) {
        $lp++;
        echo
        "<tr>
                            <th scope=\"row\">$lp</th>
                            <td>$row->affirmation</td>
                            <td>$row->date</td>
                            <td>$row->time</td>
                        </tr>
                            ";
    }
    ob_end_flush();
    ?>

    </tbody>
</table>
<!--End of displaying affirmations-->