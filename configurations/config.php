<?php
    class Configurations
    {
        public $production_base_url = "https://gandertechs.co.ke/";
        public $testing_base_url = "http://localhost/gandercompanysite/";
        public $device_base_url = "http://192.168.43.122/gandercompanysite/";
        public $mode = "test";
        public $websitename = "Gander Technologies";
        public $countdowntimer = "launch";

        public function __construct() {
        }

        public function baseurl() {

            $mode = $this->mode;
            $production_base_url = $this->production_base_url;
            $testing_base_url = $this->testing_base_url;

            $development_mode = $mode;

            switch ($development_mode) {
                case "test":
                    echo $testing_base_url;
                    break;
                case "publish":
                    echo $production_base_url;
                    break;
                case "device":
                    echo "http://10.80.250.135/gandercompanysite/";
                    break;
                case "off_device":
                    echo "http://192.168.43.122/gandercompanysite/";
                    break;    
                default:
                    echo "configuration error";
            }
        }

        public function sitename() {
            $sitename = $this->websitename;
            echo $sitename;
        }

        public function launchcounter() {
            $launchcounter = $this->countdowntimer;
            //echo $launchcounter;
            if ($launchcounter == "launch") {
                header("LOCATION: launch/countdown");
            }
        }

    }
    $config = NEW Configurations();

?>