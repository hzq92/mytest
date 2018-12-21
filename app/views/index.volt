<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    {{ getTitle() }}
    <!-- metatags -->
    <meta name="keywords" content="网页关键字" />
    <meta name="description" content="网页描述文字" />
    <!-- **** Viewport **** -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ constant('CSS_URL') }}style/reset.css"/>
    <link rel="stylesheet" type="text/css" href="{{ constant('CSS_URL') }}style/common.css"/>
    <!-- JS -->
    <script type="text/javascript" src="{{ constant('JS_URL') }}scripts/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="{{ constant('JS_URL') }}scripts/index.js"></script>
    <script type="text/javascript" src="{{ constant('JS_URL') }}scripts/jquery.event.drag-1.5.min.js"></script>
    <script type="text/javascript" src="{{ constant('JS_URL') }}scripts/jquery.touchSlider.js"></script>
    <script type="text/javascript" src="{{ constant('JS_URL') }}layer/layer.js"></script>
</head>
<body>

    <?php echo $this->getContent() ?>
</body>
</html>