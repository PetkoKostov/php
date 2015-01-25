<?php
// ------------------------------------------------------------------------
/** ========================================================================
 * PHP Console Log:
 * Petko Kostov
 * DESCTIPTION:
 * Outputs PHP variables directly on the console. Similar to Javascript`s console.log();
 * ========================================================================

TESTS
 * $test_array = array('team'=>'levski', 'team2'=>'cska');
 *
 * $test_object = new stdClass();
 * $test_object->team = 'levski';
 * $test_object->team2 = 'cska';
 *
 * $test_string = 'striiing';
 * $this->console_log($test_array);
 */


/**
 * Simple helper to debug to the console
 *
 * @param  Array, Object, String $data
 * @return String
 */
function console_log_real($data, $name = FALSE) { // за вс. сл. FALSE. Ако не извлече името
    $output = '';
    $real_var_name = '';
    if(is_string($name)) // успели сме да извлечем името
        $real_var_name = trim($name, "'");
    if ( is_array( $data ) ) {
        if (version_compare(phpversion(), '5.4.0', '>')) { // проверявам версията дали е по-голяма от 5.4 (заради ключа JSON_UNESCAPED_UNICODE)
            $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        else
            $data_json = json_encode($data); //<-- TODO да имплементирам raw_json ф-ята от работата
        $data_json = str_replace('":"', '" => "', $data_json);
        $output .= "<script>console.warn( 'Array: ' ); console.log( '%c {$real_var_name}', 'color: red', '= " . $data_json . "' );</script>"; // може би да го cut-на ако е много дълъг
    } else if ( is_object( $data ) ) {
        $data    = var_export( $data, TRUE );
        $data    = explode( "\n", $data );
        foreach( $data as $line ) {
            if ( trim( $line ) ) {
                $line    = addslashes( $line );
                $output .= "console.log( '{$line}' );";
            }
        }
        $output = "<script>console.warn( 'Object:' ); $output</script>";
    } else {
        if (strpos($name,'$') === false)
            $output .= "<script>console.warn( 'String: ' ); console.log( '{$data}' );</script>";
        else
            $output .= "<script>console.warn( 'String: ' ); console.log( '%c {$real_var_name}', 'color: red', '= {$data}' );</script>";
    }

    $output = str_replace('stdClass::__set_state', $real_var_name . ' = ', $output);

	return $output;

}

//stackoverflow.com/a/19788805/1069083
function console_log($a) { // Should work over several includes:

    $backtrace = debug_backtrace()[0];
    $fh = fopen($backtrace['file'], 'r');
    $line = 0;
    while (++$line <= $backtrace['line']) {
        $code = fgets($fh);
    }
    fclose($fh);
    preg_match('/' . __FUNCTION__ . '\s*\((.*)\)\s*;/u', $code, $name); // <-- СЕКС
    $real_name = trim($name[1]);

    echo console_log_real($a, $real_name);
}