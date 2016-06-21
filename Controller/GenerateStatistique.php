<?php // content="text/plain; charset=utf-8"
require_once ('../web/Jgraph/jpgraph.php');
require_once ('../web/Jgraph/jpgraph_bar.php');
require_once ("../Model/concat_statususernewsletter.php");
require_once ("../Model/newsletter.php");
require_once ("../Model/status.php");



function GenGraph()
{
    unlink('../web/images/files.jpg');
    $arrayOfNew =array();
    $compteur=0;
    foreach( Newsletter::getAllnewsletter() as $aNewsletter)
    {
       foreach (concat_statususernewsletter::getStatusByNewsletterID( $aNewsletter->getIdnewsletter()) as $concatItemNewStatus)
       {
           $compteur=0;
           foreach (status::getStatusById($concatItemNewStatus->getIdStatus()) as $aStatus)
           {
               if( $aStatus->getDesignation() !='TBD')
                   $compteur+=$aStatus->getDesignation()     ;
           }
           if($compteur>0)
           {
               array_push($arrayOfNew, array($aNewsletter->getCampagneName(),$compteur));
           }
       }
    }
    $arrayValue = array();
    $arrayDesignationNewsletter = array();
    foreach($arrayOfNew as $item)
    {
        array_push($arrayDesignationNewsletter,$item[0]);
        array_push($arrayValue,$item[1]);
    }


    $datay=$arrayValue;
    //var_dump($arrayDesignationNewsletter);

// Create the graph. These two calls are always required
    $graph = new Graph(840, 620, 'auto');
    $graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
    $graph->yaxis->SetTickPositions(array(0, 1, 5, 15, 20, 30,40,50,60,70,80,100,120,140,160,180,200), array(0, 45, 75, 105, 135));
    $graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels($arrayDesignationNewsletter);
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);

// Create the bar plots
    $b1plot = new BarPlot($datay);

// ...and add it to the graPH
    $graph->Add($b1plot);


    $b1plot->SetColor("white");
    $b1plot->SetWidth(45);
    $graph->title->Set("Campaign Statistiques");

// Display the graph
    $graph->Stroke("../web/images/files.jpg");

}

GenGraph();
?>