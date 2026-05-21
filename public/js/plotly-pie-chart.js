
Plotly.newPlot('pie-chart',
  // data:
  [{
    type: 'pie',
    labels: pieData.labels,
    values: pieData.values,
    // textinfo: 'label+percent+value', // Показывает подпись, процент и значение
    // insidetextorientation: 'radial', // Ориентация текста внутри долек
    // textposition: 'inside',          // Расположение текста (внутри долек)
    hoverinfo: 'label+percent+value', // Информация при наведении
    marker: {
      // colors: ['#6A5ACD', '#4682B4', '#40E0D0', '#32CD32', '#FFD700', '#FF6347', '#FF1493', '#BA55D3', '#9370DB'], // Кастомные цвета, если надо
      line: { color: '#FFFFFF', width: 2 } // Белая граница для каждой дольки
    }
  }], 
  // layout:
  {
    title: { text: 'Распраделение посетителей по городам' },
    showlegend: true,                // Показать легенду
    legend: {
      title: { text: 'Города' },     // Заголовок легенды
      x: 1.05,                       // Положение легенды (отступ справа)
      y: 0.5
    }
  }
);