<?php
 function UpdateGraph() {
    StopGraphLoop();
    interval = parseInt($('#interval').val());
    npoints = parseInt($('#npoints').val());
    maxIterations = parseInt($('#maxIterations').val());
    niters = 0;
    GraphUpdate = setInterval(runUpdate, interval);
}


function runUpdate() {
    if (niters < maxIterations) {
        BuildDataArray();
        Graph.series[0].data = GraphData;
        Graph.replot({resetAxes:true});
        niters++;
    }
    else {
        StopGraphLoop();
    }
}

function StopGraphLoop() {
    clearInterval(GraphUpdate);
}

$pc = new C_PhpChartX(array($GraphData),'Graph');
$pc->add_plugins(array('canvasTextRenderer','canvasAxisTickRenderer','canvasAxisLabelRenderer','highlighter','canvasOverlay','cursor','pointLabels'),true);

$pc->set_title(array('text'=>'Test Data Run'));    
$pc->set_cursor(array('show'=>false));
$pc->set_point_labels(array('show'=>false));
$pc->set_highlighter(array('show'=>false));

$pc->set_axes_default(array(
    'pad'=>0.05,
    'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
    'tickRenderer'=>'plugin::CanvasAxisTickRenderer',
    'labelOptions'=>array('fontSize'=>'13pt')
));
$pc->set_axes(array(
        'xaxis'=> array('label'=> 'Number'),
        'yaxis'=> array('label'=>'Value')
    ));

// should be the last method to call
$pc->draw(800,500);

?>