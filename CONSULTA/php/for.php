<html>
    <head>
        <title>For</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form>
            <select name="dia">
                <?php for($i = 1; $i <= 31; $i++): ?>
                    <option value="<?php print $i; ?>"><?php print $i; ?></option>
                <?php endfor ?>
            </select>
            /
            <select name="mês">
                <?php for($i = 1; $i <= 12; $i++): ?>
                    <option value="<?php print $i; ?>"><?php print $i; ?></option>
                <?php endfor ?>
            </select>
            /
            <select name="ano">
                <?php for($i = 1980; $i <= 2015; $i++): ?>
                    <option value="<?php print $i; ?>"><?php print $i; ?></option>
                <?php endfor ?>
            </select>
        </form>
    </body>
</html>

