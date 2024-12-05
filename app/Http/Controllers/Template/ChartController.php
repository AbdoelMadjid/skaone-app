<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function charts_apex_area()
    {
        return view('template.chart.charts-apex-area');
    }
    public function charts_apex_boxplot()
    {
        return view('template.chart.charts-apex-boxplot');
    }
    public function charts_apex_bubble()
    {
        return view('template.chart.charts-apex-bubble');
    }
    public function charts_apex_bar()
    {
        return view('template.chart.charts-apex-bar');
    }
    public function charts_apex_candlestick()
    {
        return view('template.chart.charts-apex-candlestick');
    }
    public function charts_apex_column()
    {
        return view('template.chart.charts-apex-column');
    }
    public function charts_apex_funnel()
    {
        return view('template.chart.charts-apex-funnel');
    }
    public function charts_apex_heatmap()
    {
        return view('template.chart.charts-apex-heatmap');
    }
    public function charts_apex_line()
    {
        return view('template.chart.charts-apex-line');
    }
    public function charts_apex_mixed()
    {
        return view('template.chart.charts-apex-mixed');
    }
    public function charts_apex_pie()
    {
        return view('template.chart.charts-apex-pie');
    }
    public function charts_apex_polar()
    {
        return view('template.chart.charts-apex-polar');
    }
    public function charts_apex_radar()
    {
        return view('template.chart.charts-apex-radar');
    }
    public function charts_apex_radialbar()
    {
        return view('template.chart.charts-apex-radialbar');
    }
    public function charts_apex_range_area()
    {
        return view('template.chart.charts-apex-range-area');
    }
    public function charts_apex_scatter()
    {
        return view('template.chart.charts-apex-scatter');
    }
    public function charts_apex_timeline()
    {
        return view('template.chart.charts-apex-timeline');
    }
    public function charts_apex_treemap()
    {
        return view('template.chart.charts-apex-treemap');
    }
    public function charts_chartjs()
    {
        return view('template.chart.charts-chartjs');
    }
    public function charts_echarts()
    {
        return view('template.chart.charts-echarts');
    }
}
