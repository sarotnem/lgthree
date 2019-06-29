<?php

function calculateWindComponent($windDirection, $windSpeed, $runwayHeading)
{
    $theta = abs($runwayHeading - $windDirection);
    $component = round($windSpeed * cos(deg2rad($theta)));

    return $component;
}

function getFileOriginalName($file)
{
    return pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
}

function getFileOriginalExtension($file)
{
    return pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
}
