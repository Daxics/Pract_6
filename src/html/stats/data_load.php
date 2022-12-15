<?php

function get_raw_data(): array {
    $input = file_get_contents('results.json');
    return json_decode($input);
}

function get_purchases_count($data): array
{
    $purchases_count = array();
    foreach ($data as $row) {
        $purchases = $row->purchases;
        if(!isset($purchases_count[$purchases])) {
            $purchases_count[$purchases] = 0;
        }
        $purchases_count[$purchases] += 1;
    }
    ksort($purchases_count);
    return $purchases_count;
}

function get_labels_and_values(): array
{
    $raw_data = get_raw_data();
    $purchases_count = get_purchases_count($raw_data);
    $labels = array_keys($purchases_count);
    $values = array_values($purchases_count);
    return array("labels" => $labels, "values" => $values);
}