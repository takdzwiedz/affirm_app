<<<<<<< HEAD
<!-- Table display -->

<table class="table table-bordered">
    <thead>
    <tr>
        <th>l.p.</th>
        <td>Treść</td>
        <td>data</td>
        <td>godzina</td>
    </tr>
    </thead>

    <tbody>
    <?php

    $connection = new DbConnect();
    $request = "SELECT * FROM `affirmation`";
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
=======
<!-- Table display -->

<table class="table table-bordered">
    <thead>
    <tr>
        <th>l.p.</th>
        <td>Treść</td>
        <td>data</td>
        <td>godzina</td>
    </tr>
    </thead>

    <tbody>
    <?php

    $connection = new DbConnect();
    $request = "SELECT * FROM `affirmation`";
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
>>>>>>> eb6469bb21ac537d4165bb85426722ec139273a2
