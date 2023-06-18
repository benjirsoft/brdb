<!DOCTYPE html>
<html>
<head>
    <title>Product Label</title>
    <style>
        /* Define the label layout styles */
        .label {
            width: 1.5in;
            height: 1in;
            border: 1px solid black;
            font-size: 12pt;
            font-family: Sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .test{

            margin-bottom: 1px;
        }
        .barcode {
            display: block;
            width: 100%;
            height: 50%;
            margin-top:5px;
            
        }
        .barcode svg{

            margin-left: 13px;
        }
    </style>
</head>
<body>
    <div class="label">
        <div class="test">
            <div style="font-size:10px; margin-left: 50px; font-family:Patua;">Karupalli BRDB</div>
            <div style="margin-top: 5px; font-size: 9pt; font-weight: bold; font-family:Fjalla; margin-bottom: 2px">{{ $productname }} Price: {{ $cprice }} Tk</div>
        </div>
        <div class="barcode">    
            <svg>{!! DNS1D::getBarcodeSVG($productid, 'C128', 2, 40) !!}</svg>
        </div>    
        
    </div>
</body>
</html>







