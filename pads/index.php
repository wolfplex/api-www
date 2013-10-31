<?php
    /**
     * Gets the pads
     *
     * @return Array the pads list
     */
    function get_pads () {
        //TODO: move API key in config
        $url = "http://pad.wolfplex.org/api/1.2.1/listAllPads?apikey=U67yKTUDzz19fEHyrAuNN4zUnKxbOJZu";
        $api_reply = json_decode(file_get_contents($url));
        if ($api_reply->code == 0) {
            return $api_reply->data->padIDs;
        }
        throw new Exception("API fatal error: $api_reply->message");
    }

    $format = array_key_exists('format', $_GET) ? $_GET['format'] : '';
    switch ($format) {
        case "":
        case "json":
            echo json_encode(get_pads());
            break;

        case "raw":
            echo implode("\n", get_pads());
            break;

        case "txt":
            header("Content-Type: text/plain");
            foreach (get_pads() as $pad) {
                echo "* $pad\n";
            }
            break;

        default:
            die("Unknown format: $format");
    }
?>