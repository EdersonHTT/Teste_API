<?php

class Response {

    public static function json($status = 200, $message = "success"){

        header("Content-Type: application/json");

        // Check if API is active
        if(!API_IS_ACTIVE){

            return json_encode([

                "status" => $status,
                "message" => "API is not running",
                "api_version" => API_VERSION,
                "time_response" => time(),
                "datetime_response" => date("Y-m-d H:i:s"),
                "data" => null
            ], JSON_PRETTY_PRINT);
        }
        

        return json_encode([

            "status" => $status,
            "message" => $message,
            "api_version" => API_VERSION,
            "time_response" => time(),
            "datetime_response" => date("Y-m-d H:i:s"),
        ], JSON_PRETTY_PRINT);
    }
}