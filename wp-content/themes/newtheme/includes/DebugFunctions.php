<?php
/*
 * Functions to debug
 * Add this wherever you need to debug
 */

class DebugFunctions
{

    /**
     * Write something to log
     * @param $file_name
     * @param string $message
     * @param string $data
     * @param bool $print_r
     * @return void
     */
    function writeToLog($file_name, string $message = '', string $data = '' , bool $print_r = false): void
    {

        // create folder for logs if it doesn't exist
        $log_path = dirname(__file__, 1) . '/logs/'.$file_name.'.txt';
        if (!file_exists($log_path)) {
            mkdir($log_path, 0777, true);
        }
        $file       = fopen($log_path, 'a');
        $log_entry  = date("d-m-Y h:i:sa") . ' ' . $message.PHP_EOL;

        if($print_r){
            $log_entry  = date("d-m-Y h:i:sa") . ' ' . print_r($data, true).PHP_EOL;
        }

        fwrite($file, $log_entry);
        fclose($file);
    }


    /**
     * @param $debug
     * @return void
     * Display debug information in a readable way
     */
    function prettyDebug($debug): void
    {
    ?>
    <pre>
        <?php
        print_r($debug);
        ?>
    </pre>
        }
    <?php
    }
}