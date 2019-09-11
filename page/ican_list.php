<!-- Table display -->

<ul class="nav nav-tabs nav-justified">
    <li class="active"><a data-toggle="tab" href="#female">"Mogę" żeńskie</a></li>
    <li><a data-toggle="tab" href="#male">"Mogę" męskie</a></li>
</ul>

<div class="tab-content">
    <div id="female" class="tab-pane fade in active">
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

            use Mozesz\MozeszNamespace\DbConnect;

            $connection = new DbConnect();
            $request = "SELECT * FROM `affirmation_female` ORDER BY `affirmation_female`.`id_affirmation` DESC";
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
            ?>

            </tbody>
        </table>
    </div>

    <div id="male" class="tab-pane fade">
        <div id="female" class="tab-pane fade in active">
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
                $request = "SELECT * FROM `affirmation_male` ORDER BY `affirmation_male`.`id_affirmation` DESC";
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

                ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<!--End of displaying affirmations-->