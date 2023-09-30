<?php
    use App\Models\ActivitySessions;
?>



{{-- TODO: Convert to components? --}}

{{-- Include the graphing options first so that a user can easily resubmit new parameters while viewing the already rendered graph --}}
@include('graphing_options')
<h1>graphs</h1>

<div>
    {{ $graph1->options['chart_title'] }}
    {!! $graph1->renderHtml() !!}
</div>
{{-- Load the Chart.js library --}}
{!! $graph1->renderChartJsLibrary() !!}
{{-- Spit the graphing data out for the Chart.js library to use --}}
{!! $graph1->renderJs() !!}