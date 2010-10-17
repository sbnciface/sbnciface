<?php
function byte_format($byte, $pre = 1, $abbr = true, $array = false, $bit = false) {
    /* Check All Arguments */
    if (!is_numeric($byte))
        return "Bytes given are not numerical!";
    if (!is_numeric($pre))
        return "Round precision is not numerical!";
    if (!is_bool($abbr))
        return "Abbreviation format argument is not a boolean!";
    if (!is_bool($array))
        return "Array argument is not a boolean!";
    if (!is_bool($bit))
        return "Bit conversion argument is not a boolean!";

    /* Format Arguments */
    if ($bit)
        $byte /= 8;

    /* Define Known Unit Types */
    $units = array(
        array("B", "Byte"),
        array("KB", "KiloByte"),
        array("MB", "MegaByte"),
        array("GB", "GigaByte"),
        array("TB", "TeraByte"),
        array("PB", "PetaByte"),
        array("EB", "ExaByte"),
        array("ZB", "ZettaByte"),
        array("YB", "YottaByte")
    );

    /* Start Conversion */
    $i = 0;

    while ($byte > 1024):
        $byte /= 1024;
        $i += 1;
    endwhile;

    /* Clean Up Bytes */
    $byte = round($byte, $pre);

    /* Format Units */
    if ($byte != 1)
        $s = "'s";

    /* Return Formatted Bytes */
    if (!$array)
        return ($abbr) ? $byte . " " . $units[$i][0] : $byte . " " . $units[$i][1] . $s;

    /* Return Formatted Array */
    $array = array();
    $array['bytes'] = $byte;
    $array['units'] = ($abbr) ? $units[$i][0] : $units[$i][1] . $s;
    return $array;
}
?>
