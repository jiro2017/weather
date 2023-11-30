<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Weather Condition</title>
</head>
<style>
    body {
        background: rgb(230, 230, 230);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    form.getweather {
        margin:auto;
        width:90%;
        padding-top:10vh;
        background:white;
        padding: 1rem;
    }
    form.getweather h1.heading {
        text-align: center;
        word-wrap: break-word;
    }

    form.getweather p.cityname, form.getweather p.current_temperature, form.getweather p.description {
        font-size:1.2rem;
    }

    form.getweather input{
        border-radius: 16px;
        width: 95%;
        font-size:1rem;
        padding:1rem;
        outline:none;
        border:none;
        background: rgb(230, 230, 230);
        /* background: rgb(192, 192, 192); */
        font-weight:bold;
    }

    form.getweather input.error {
        border:2px solid red;
    }

    form.getweather p.error {
        color: red;
        margin:0 initial;
        display:none;
    }

    form.getweather p.error.show {
        display: block;
    }

    form.getweather input[type="submit"], form.getweather input[type="button"] {
        background:green;
        color:white;
        width:fit-content;
        height:fit-content;
        display: block;
        outline:none;
        font-size:1.5rem;
        border:none;
        font-weight: bold;
        cursor:pointer;
        margin-top:1rem;
    }
</style>