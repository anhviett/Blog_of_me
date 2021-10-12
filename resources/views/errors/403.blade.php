<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403</title>
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Audiowide);
    body{
        background-color: #1D1F20;
    }
    #errorWrapper{
        display:block;
        position:fixed;
        width: 100%;
        top: 45%;
        left: 50%;
        text-align: center;
        transform: translate(-50%, -50%);
    }
    #error403{
        width: 80vw;
        max-width: 400px;
        height: 80vw;
        max-height: 400px;
        margin: 0 auto;
        border-radius:50%;
        background-color: #333;
        background-image:
            url( 'http://coolsys.paulonavarro.com/css/images/403.svg'),
            url( 'http://coolsys.paulonavarro.com/css/images/403stripe.svg');
        background-size: 85%, 15%;
        background-repeat: no-repeat, repeat-x;
        background-position: 800% 100%, 130% 75%;
        box-shadow: inset 0 0 10px 3px #000;
        animation: grow 1s 1, security 1s 1 0.5s forwards;
    }
    #errorText{
        margin: 0;
        font-family: 'Audiowide', cursive;
        text-align: center;
        color: #ccc;
        font-size: 40px;
    }
    .red{
        color: rgb(255, 50, 50);
        animation: glow 2s infinite;
    }
    @keyframes grow{
        0%{
            width: 0;
            height: 0;
        }
    }
    @keyframes security{
        0%{
            background-position: 800% 100%, 130% 75%;
        }
        100%{
            background-position:50% 100%, 130% 75%;
        }
    }
    @keyframes glow{
        0%{
            text-shadow: 0 0 3px rgba(255, 0,0,0.8);
        }
        50%{
            text-shadow: 0 0 20px rgba(255, 0,0,0.8);
        }
        100%{
            text-shadow: 0 0 3px rgba(255, 0,0,0.8);
        }
    }
</style>
<body>
<div id="errorWrapper">
    <div id="error403">

    </div><p id="errorText">
        <span class="red">error 403</span><br> access denied</p></div>
</body>
</html>
