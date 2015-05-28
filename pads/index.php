<?php
    require '../_includes/core.php';
    require '../_includes/SecurityData.php';

    /**
     * Gets the pads
     *
     * @return Array the pads list
     */
    function get_pads () {
        //Queries API
        $apiUrl = "http://pad.wolfplex.be/api/1.2.1/listAllPads";
        $key = SecurityData::getSecret('etherpad.api.key');
        $url = $apiUrl . "?apikey=" . $key;
        try {
            $api_reply = json_decode(file_get_contents($url));
        } catch (ErrorException $ex) {
            //Logs error, but removes sensitive information
            $errorMessage = str_replace($url, "$apiUrl?…", $ex->getMessage());
            Logger::getLogger("pads")->fatal($errorMessage);
            return [];
        }

        //Check reply sanity
        if (!property_exists('code', $api_reply)) {
            Logger::getLogger("pads")->fatal("Unexpected API reply.");
            return [];
        }
        if ($api_reply->code === 0) {
            return $api_reply->data->padIDs;
        }

        //If an error occurs, we log the error and returns an empty array instead.
        Logger::getLogger("pads")->fatal("API fatal error: $api_reply->message");
        return [];
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
