<?php


function task1($dataXml)
{
    $xmlText = file_get_contents($dataXml);
    $xml = new SimpleXMLElement($xmlText);
    ?>

    <section>
        <h1> Purchase order number: <?php echo $xml->attributes()->PurchaseOrderNumber ?> </h1>
        <h2> Order date: <?php echo $xml->attributes()->OrderDate ?> </h2>
        <h3 class='title'>Address</h3>

        <table>
            <tr>
                <th>Address Type</th>
                <th>Name</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Country</th>
            </tr>
            <?php foreach ($xml->Address as $item) : ?>
                <tr>
                    <td><?php echo $item->attributes()->Type ?> </td>
                    <td> <?php echo $item->Name ?> </td>
                    <td> <?php echo $item->Street ?> </td>
                    <td> <?php echo $item->City ?></td>
                    <td> <?php echo $item->State ?> </td>
                    <td> <?php echo $item->Zip ?></td>
                    <td> <?php echo $item->Country ?> </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <h3 class='title'>Products</h3>
        <table>
            <tr>
                <th>Items</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>USPrice</th>
                <th>Ship date</th>
                <th>Comment</th>
            </tr>
            <?php foreach ($xml->Items->Item as $item) : ?>
                <tr>
                    <td> <?php echo $item->attributes()->PartNumber ?></td>
                    <td> <?php echo $item->ProductName ?></td>
                    <td> <?php echo $item->Quantity ?></td>
                    <td> <?php echo $item->USPrice ?></td>
                    <td> <?php echo($item->ShipDate ?? 'no data') ?></td>
                    <td> <?php echo($item->Comment ?? 'no comment') ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
        <strong class='strong'>Delivery Notes: <?php echo $xml->DeliveryNotes ?> </strong>
    </section>
    <?php

    function task2()
    {
        $X5 = [
            'speed' => 120,
        ];
        $Auris = [
            'speed' => 100,
        ];
        $Corsa = [
            'speed' => 70,
        ];
        $cars = [
            'bmw' => $X5,
            'toyota' => $Auris,
            'opel' => $Corsa
        ];

        $output = json_encode($cars);
        file_put_contents('output.json', $output);

        if (mt_rand(0, 1) == 1) {
            foreach ($cars as $key => $value) {
                $cars[$key] = ['speed' => mt_rand(70, 200)];
            }
            $output2 = json_encode($cars);
            file_put_contents('output2.json', $output2);
        }

        $cars1 = json_decode(file_get_contents('output.json'), true);
        $cars2 = json_decode(file_get_contents('output2.json'), true);

        $result = '';
        foreach ($cars1 as $key => $value) {
            if ($cars2[$key]['speed'] !== $value['speed']) {
                $result .= '<section><p> Вторая скорость ' . $cars2[$key]['speed'] .
                    ' неровная первой скорости ' .
                    $value['speed'] . '.</p></section>';
            }
        }
        return $result;
    }


    function task3($csvFile = 'output.csv')
    {
        $roundNum = [];
        for ($i = 1; $i <= 50; $i++) {
            $roundNum[] = mt_rand(1, 100);
        }
        $numbers[] = $roundNum;
        if (!file_exists($csvFile)) {
            $csvOpen = fopen($csvFile, 'w');
            foreach ($numbers as $number) {
                fputcsv($csvOpen, $number, ',');
            }
            fclose($csvOpen);
        }
        $csv = file_get_contents($csvFile);
        $result = explode(',', $csv);
//
        $sum = 0;
        foreach ($result as $value) {
            if (intval($value) % 2 == 0) {
                $sum += intval($value);
            }
        }
        return '<section><p> Сумма:' . $sum . '.</p></section>';
    }

    function task4()
    {
        $path = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
        $data = json_decode($path, true);
        $result = '<section><p>Title: ' . $data['query']['pages']['15580374']['title'] . '</p>';
        $result .= '<p>Page id: ' . $data['query']['pages']['15580374']['pageid'] . '</p></section>';
        return $result;
    }
}


