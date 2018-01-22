<?php

/**
*   @method readCSVFromLine
*   @param String
*   @param Int
*   @param Int
*
*   @return Array
*/
private function readCSVFromLine( $csvFile, $fromLine = 0, $linesToShow = 0 )
{
    $csvArray    = [];
    $file_handle = fopen($csvFile, 'r');
    $line        = 0;
    $fileLines   = 10;
    $show        = 0;

    if( $linesToShow != 0 || $linesToShow != "0")
        $fileLines = $linesToShow;

    while (!feof($file_handle) )
    {
        $row = fgetcsv($file_handle, 1024, ',');

        if( $line >= $fromLine && $show < $fileLines)
        {
            if( !empty($row) )
                $csvArray[] = $row;

            $show ++;
        }

        $line ++;
    }

    fclose($file_handle);
    return $csvArray;
}

?>
