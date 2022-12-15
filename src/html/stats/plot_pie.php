<?php
require_once '/etc/apache2/vendor/autoload.php';

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

require_once 'data_load.php';

function draw_plot_pie(): void
{
    $graph = new Graph\PieGraph(800, 600);
    $graph->SetBox(true);

    $labels_and_values = get_labels_and_values();
    $labels = $labels_and_values["labels"];
    $values = $labels_and_values["values"];

    $p1 = new Plot\PiePlot($values);
    $p1->ShowBorder();
    $p1->SetColor('black');
    $p1->SetLabels($labels);
    $p1->SetLegends($labels);

    $graph->Add($p1);

    $graph->Stroke("images/plot_pie.png");
}