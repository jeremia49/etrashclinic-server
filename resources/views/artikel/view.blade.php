<html>

<head>
    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        {{ $data->title }}
    </title>
</head>

<body>
    @if ($data->isVideo)
    <style>
        html,
        body,
        #video-container {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        #video-container {
            position: relative;
        }

        .video-js {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

    </style>
    <video id="my-video" class="video-js" controls preload="auto" poster="/storage/{{$data->imgUrl}}" data-setup="{}">
        <source src="/storage/{{$data->content}}" type="video/mp4" />
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>

    <script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>
    @else
    {!! $data->content !!}
    @endif
</body>

</html>
