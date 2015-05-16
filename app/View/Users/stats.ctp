<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <script type="text/javascript">
  window.onload = function () {
      CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#276169"               
                ]);
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Top 10 Habilidades"    
      },
      animationEnabled: true,
      colorSet: "greenShades",
      axisY: {
        title: "Usuarios"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "grey",
        legendText: "MMbbl = one million barrels",
        dataPoints: [     
            <?php foreach($skills as $skill){ ?>
        {y: <?php echo $skill[0]['count']; ?> , label: "<?php echo $skill['Skill']['title']; ?>"},
            <?php } ?>      
        ]
      }   
      ]
    });
    
    var chart2 = new CanvasJS.Chart("chart2Container",
    {
      title:{
        text: "Top 10 Idiomas"    
      },
      animationEnabled: true,
      colorSet: "greenShades",
      axisY: {
        title: "Usuarios"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "grey",
        legendText: "MMbbl = one million barrels",
        dataPoints: [     
            <?php foreach($languages as $language){ ?>
        {y: <?php echo $language[0]['count']; ?> , label: "<?php echo $language['Language']['title']; ?>"},
            <?php } ?>      
        ]
      }   
      ]
    });
     var chart3 = new CanvasJS.Chart("chart3Container",
    {
      title:{
        text: "Perfiles más visitados"    
      },
      animationEnabled: true,
      colorSet: "greenShades",
      axisY: {
        title: "Visitas"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: "grey",
        legendText: "MMbbl = one million barrels",
        dataPoints: [     
            <?php foreach($users as $user){ ?>
        {y: <?php echo $user['User']['views']; ?> , label: "<?php echo $user['User']['name'].' '.$user['User']['surname1']; ?>"},
            <?php } ?>      
        ]
      }   
      ]
    });
    chart.render();
    chart2.render();
    chart3.render();
  }
  </script>
  
  <div id="chartContainer" class="firstelement" style="height: 300px; width: 100%;"></div>
    <div id="chart2Container" class="firstelement" style="height: 300px; width: 100%;"></div>
    <div id="chart3Container" class="firstelement" style="height: 300px; width: 100%;"></div>