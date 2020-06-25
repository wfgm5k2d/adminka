<?php
$stat = new ACStatistic;
$arViews = $stat->arViews();
$uniqueIp = $stat->arUniqueIP();
$arDate = $stat->arDate();
$stat->dropDate();
?>
<h1 style="margin-bottom: 20px;">Добро пожаловать в панель администратора</h1>



<div id='myDiv'></div>
<div id="chart_div"></div>
<!-- <div class="main-modul">
    <h1 class="main-modul__title">Модули управления панелью администратора</h1>
    <div class="main-modul-moduls">
        <?php
            $modules = new Modules;
            foreach($modules->getModuleSale() as $element)
            {
                echo '
                        <div class="main-modul-moduls-block">
                            <div class="main-modul-moduls-block__title">
                                '.$element['module'].'
                            </div>
                            <div class="main-modul-moduls-block__description">
                                Подлкючите каталог для удобного использования интернет магазина
                                <p>
                                    Купите модуль "Каталог" для удобного использования интернет-магазина и забудьте о проблемах
                                </p>
                            </div>
                ';
                        if($element['hide'] == 1)
                        {
                            echo '
                                <div class="main-modul-moduls-block__price">
                                    Модуль приобретен
                                </div>
                            ';
                        }
                        else
                        {
                            echo '
                                <div class="main-modul-moduls-block__price">
                                    Купить
                                </div>
                            ';
                        }
                echo '
                        </div>
                ';
            }
        ?>
    </div>
</div> -->
<script>
    /*
        Верхняя статистика
    */
    let uniqueIp = <?php
                echo '[';
                foreach($uniqueIp as $element)
                {
                    echo $element['uniques'].', ';
                }
                echo ']';
                ?>;
    let trace1 = {
        x: <?php
                echo '[';
                foreach($arDate as $date)
                {
                    echo substr($date['date'], -2).', ';
                }
                echo ']';
            ?>,
        y: uniqueIp,
        type: 'bar',
        name: 'Уникальных посетителей',
        marker: {
            color: 'rgb(49,130,189)',
            opacity: 0.7,
        }
    };

    let arViews = <?php
                echo '[';
                foreach($arViews as $value)
                {
                    echo $value['views'].', ';
                }
                echo ']';
                ?>;
    let trace2 = {
        x: <?php
        echo '[';
        foreach($arDate as $date)
        {
            echo substr($date['date'], -2).', ';
        }
        echo ']';
        ?>,
        y: arViews,
        type: 'bar',
        name: 'Просмотров',
        marker: {
            color: 'rgb(204,204,204)',
            opacity: 0.5
        }
    };

    let data = [trace1, trace2];

    let layout = {
        title: 'Статистика сайта ArtComunity за месяц',
        xaxis: {
            tickangle: -45
        },
        barmode: 'group'
    };

    Plotly.newPlot('myDiv', data, layout);

/*
    Нижняя статистика
*/
      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Уникальных за месяц', <?=ACStatistic::countUniqueMonth();?>],
          ['Уникальных за неделю', <?=ACStatistic::countUniqueWeek();?>],
          ['Уникальных за день', <?=ACStatistic::countUniqueDay();?>],
          ['Просмотров за месяц', <?=ACStatistic::countViewsMonth();?>],
          ['Просмотров за неделю', <?=ACStatistic::countViewsWeek();?>],
          ['Просмотров за день', <?=ACStatistic::countViewsDay();?>],
        ]);

        var options = {'title':'Подробная статистика за месяц',
                       'width':800,
                       'height':400};

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>