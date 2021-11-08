<?php

/*
 * Function to convert datetime into human readable format
 * timeElapsedString('2013-05-01 00:22:35');              -- 4 months ago
 * timeElapsedString('2013-05-01 00:22:35', true);        -- 4 months ago
 * timeElapsedString('@1367367755'); # timestamp input    -- 4 months, 2 weeks, 3 days, 1 hour, 49 minutes, 15 seconds ago
*/

if (!function_exists('timeElapsedString')) {
    function timeElapsedString($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}