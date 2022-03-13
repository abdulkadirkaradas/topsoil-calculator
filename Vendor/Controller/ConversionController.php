<?php
    namespace Vendor\Controllers;

    class Conversion
    {
        // cm/inches to metres measurement coefficient
        const CENTIMETRETOMETRESCOEFFICIENT = 0.01;
        const INCHESTOMETRESCOEFFICIENT = 0.0254;

        // yards to metres measurement coefficient
        const YARDSTOMETRESCOEFFICIENT = 0.9144;

        // feet to metres measurement coefficient
        const FEETTOMETRESCOEFFICIENT = 0.3048;

        public function measurementConverter($measurementType, $conversionType, $measurementValue)
        {
            switch([$measurementType, $conversionType]) {
                case ["centimetres", "metres"]: 
                    return $measurementValue * self::CENTIMETRETOMETRESCOEFFICIENT;
                    break;
                case ["inches", "metres"]: 
                    return $measurementValue * self::INCHESTOMETRESCOEFFICIENT;
                    break;
                case ["yards", "metres"]: 
                    return $measurementValue * self::YARDSTOMETRESCOEFFICIENT;
                    break;
                case ["feet", "metres"]: 
                    return $measurementValue * self::FEETTOMETRESCOEFFICIENT;
                    break;
            }
        }
    }
?>