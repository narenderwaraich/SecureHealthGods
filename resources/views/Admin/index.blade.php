@extends('layouts.admin')
@section('content')

<!-- top header -->
<div class="panel-header panel-header-lg">
   <div id="topChart"></div>           
</div>
<!-- end header    -->
    <div class="content mt-3">
        <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Today Total Sale</div>
                                        <div class="stat-digit">
                                            <p style="margin-bottom: 0;"><i class="fa fa-inr"></i> 0</p>
                                            <p style="margin-bottom: 0;"><i class="fa fa-calendar"></i> {{ date('d-m-Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Last Month Total Sale</div>
                                        <div class="stat-digit">
                                            <p style="margin-bottom: 0;"><i class="fa fa-inr"></i> 0</p>
                                            <p style="margin-bottom: 0;"><i class="fa fa-calendar"></i> {{ date('d-m-Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Last Year Total Sale</div>
                                        <div class="stat-digit">
                                            <p style="margin-bottom: 0;"><i class="fa fa-inr"></i> 0</p>
                                            <p style="margin-bottom: 0;"><i class="fa fa-calendar"></i> {{ date('d-m-Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-inr text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Sale</div>
                                        <div class="stat-digit">
                                            <p style="margin-bottom: 0;"><i class="fa fa-inr"></i> 0</p>
                                            <p style="margin-bottom: 0;"><i class="fa fa-calendar"></i> {{ date('d-m-Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

            


    </div> <!-- .content -->
</div><!-- /#right-panel -->

    <!-- Right Panel -->

<!-- Styles -->
<style>
  body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

#topChart {
  width: 100%;
  height: 400px;
}
#piChart,
#piChartDevilery{
  width: 100%;
  height: 350px;
}
.panel-header {
    height: 260px;
    padding-top: 20px;
    padding-bottom: 20px;
    background: #141E30;
    background: -webkit-gradient(linear, left top, right top, from(#0c2646), color-stop(60%, #204065), to(#2a5788));
    background: linear-gradient(to right, #0c2646 0%, #204065 60%, #2a5788 100%);
    position: relative;
    overflow: hidden;
}
.panel-header-lg {
    height: 450px;
}
.card {
    border: 0;
    border-radius: 0.1875rem;
    display: inline-block;
    position: relative;
    width: 100%;
    margin-bottom: 20px;
    box-shadow: 0 1px 15px 1px rgba(39, 39, 39, 0.1);
}
.card .card-header {
    padding: 15px 15px 0;
    border: 0;
}
.card .card-header{
    background-color: transparent;
}
.category, .card-category {
    text-transform: capitalize;
    font-weight: 400;
    color: #9A9A9A;
    font-size: 0.7142em;
}
.card-category {
    font-size: 1em;
}
.card-chart .card-header .card-category {
    margin-bottom: 5px;
}
.card-chart .card-header .card-title {
    margin-top: 10px;
    margin-bottom: 0;
}
.card .card-header .card-title {
    margin-top: 10px;
}
.card .card-header .card-category {
    margin-bottom: 5px;
}
.card .card-body {
    padding: 15px 15px 10px 15px;
}
.card-chart .chart-area {
    height: 190px;
    width: calc(100% + 30px);
    margin-left: -15px;
    margin-right: -15px;
}
.card-chart .card-footer {
    margin-top: 15px;
}
.card .card-footer {
    background-color: transparent;
    border: 0;
}
.card-chart .card-footer .stats {
    color: #9A9A9A;
}
.chart-area.sale-area {
    padding: 0px 20px;
}
.chart-area.sale-area div{
    width: 100%;
}
.chart-area.sale-area div span:first-child{
    width: 50%;
    float: left;
}
.chart-area.sale-area div span:last-child{
    width: 50%;
    float: right;
}
.toady-sale-txt-title {
    color: #04BF37;
    font-size: 18px;
    font-weight: 800;
    line-height: 40px;
}
.last-month-sale-txt-title {
    color: #f37914;
    font-size: 18px;
    font-weight: 800;
    line-height: 40px;
}
.last-year-sale-txt-title {
    color: #808080;
    font-size: 18px;
    font-weight: 800;
    line-height: 40px;
}
.total-sale-txt-title {
    color: #e91e63;
    font-size: 18px;
    font-weight: 800;
    line-height: 40px;
}
.toady-sale-txt-title-amount{
    color: #04BF37;
    font-size: 18px;
    font-weight: 700;
    line-height: 40px;
}
.last-month-sale-txt-title-amount{
    color: #f37914;
    font-size: 18px;
    font-weight: 700;
    line-height: 40px;
}
.last-year-sale-txt-title-amount{
    color: #808080;
   font-size: 18px;
    font-weight: 700;
    line-height: 40px;
}
.total-sale-txt-title-amount{
    color: #e91e63;
   font-size: 18px;
    font-weight: 700;
    line-height: 40px;
}
</style>
<script src="/jquery/jquery-3.2.1.min.js"></script>
<script src="/amcharts4/core.js"></script>
<script src="/amcharts4/charts.js"></script>
<script src="/amcharts4/plugins/sunburst.js"></script>
<script src="/amcharts4/themes/animated.js"></script>

@endsection