
Plotly.newPlot('bar-chart', 
  //data:
  [{
    x: barData.x,
    y: barData.y,
    type:"bar",
    orientation:"h",
    marker: {color:"rgba(0,0,255,0.6)"}
  }], 
  //layout:
  {
    title: { text: 'Количество посещений по часам' },
    xaxis: { title: { text: 'Количество посещений' } },
    yaxis: { title: { text: 'Час суток' } }
  }
);
