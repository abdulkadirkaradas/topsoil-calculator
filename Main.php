<?php
    namespace Main;

    require "../topsoilCalculator/Database/TableBuilder/TableBuilder.php";
    use Database\TableBuilder\Builder;
    
    class Main
    {
        private $setTable;

        function __construct()
        {
            $this->setTable = new Builder();
        }

        public function init()
        {
            $this->setTable->setTable();
        }
    }

    $init = new Main();
    $init->init();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container">
        <div class="card">
            <div class="card-header text-center">
                Measurement Calculator
                <div class="basket-icon unselect">
                    Basket
                </div>
            </div>
            <div class="card-body">
                <div class="row measurement-unit-group" style="width: 100%;">
                    <div class="form-group measurement-unit">
                        <label for="">Measurement Unit</label>
                        <select class="form-control" name="" id="measurementUnit" required>
                            <option value disabled selected>Please Select</option>
                            <option value="metres">Metres</option>
                            <option value="feet">Feet</option>
                            <option value="yards">Yard</option>
                        </select>
                    </div>
                    <div class="form-group measurement-unit">
                        <label for="">Depth Unit</label>
                        <select class="form-control" name="" id="depthUnit" required>
                            <option value disabled selected>Please Select</option>
                            <option value="centimetres">Centimetres</option>
                            <option value="inches">Inches</option>
                        </select>
                    </div>
                </div>

                <div class="row" style="width: 100%;">
                    <div class="form-group dimensions-goup">
                        <label for="">Width</label>
                        <input class="form-control" type="number" min="0" id="width" required>
                    </div>
                    <div class="form-group dimensions-goup">
                        <label for="">Length</label>
                        <input class="form-control" type="number" min="0" id="length" required>
                    </div>
                    <div class="form-group dimensions-goup">
                        <label for="">Depth</label>
                        <input class="form-control" type="number" min="0" id="depth" required>
                    </div>
                </div>

                <div class="row calculate-row unselect">
                    <div class="calculate-button">Calculate</div>
                    <div class="add-to-basket-button">Add to Basket</div>
                </div>

                <div class="row">
                    <div class="form-group result-group">
                        <label for="">Needed Quantity of Bag</label>
                        <div class="quantity-of-bag result-input no-select"></div>
                    </div>
                    <div class="form-group result-group">
                        <label for="">Total cost of Topsoil</label>
                        <div class="cost-of-topsoil result-input no-select"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>   
</body>
</html>

<script>

</script>

<style>
    html, body, .container {
        width: 100%;
        height: 100%;
        background-color: #fefefe;
    }
    .container {
        padding: 10px;
    }

    .container .card-header .basket-icon {
        width: 100px;
        height: 30px;
        border: 1px solid black;
        border-radius: 5px;
        float: right;
        justify-content: center;
        align-items: center;
        display: flex;
        font: normal normal normal 15px/15px "arial";
    }

    .container .card-body .measurement-unit, .container .card-body .measurement-unit-value {
        width: 50%;
        padding: 10px;
    }

    .container .card-body .dimensions-goup {
        width: 33%;
        padding: 10px;
    }

    .container .card-body .result-group {
        width: 50%;
        padding: 10px;
    }
    
    .container .card-body .result-group .result-input {
        width: 100%;
        height: 35px;
        border: 1px solid black;
        border-radius: 10px;
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .container .card-body .calculate-row {
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .container .card-body .calculate-button, .container .card-body .add-to-basket-button {
        width: 150px;
        cursor: pointer;
        border: 1px solid black;
        border-radius: 10px;
        float: right;
        text-align: center;
    }

    .container .card-body .add-to-basket-button {
        margin-left: 10px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .unselect {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

</style>