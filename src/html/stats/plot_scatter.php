<?php
require_once '/etc/apache2/vendor/autoload.php';

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

require_once 'data_load.php';

function draw_plot_scatter(): void
{
    $data = get_labels_and_values();
    $datax = $data["labels"];
    $datay = $data["values"];

    $graph = new Graph\Graph(800, 600);
    $graph->SetScale('linlin');

    $graph->img->SetMargin(40, 40, 40, 40);
    $graph->SetShadow();


    $sp1 = new Plot\ScatterPlot($datay, $datax);
    $sp1->mark->SetType(MARK_FILLEDCIRCLE);
    $sp1->mark->SetFillColor("#ff8800");
    $sp1->mark->SetWidth(8);

    $graph->Add($sp1);
    $graph->Stroke("images/plot_scatter.png");
}
