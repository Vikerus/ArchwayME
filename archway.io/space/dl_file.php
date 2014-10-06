<?php
header("Content-type:application/pdf");
header('Location: /space/blackhole.txt');
// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename='blackhole.pdf'");

// The PDF source is in original.pdf
readfile("blackhole.pdf");
?>
<html>
<head>
<title>Download Source!</title>
</head>
<body>
<p>Coming soon file to binary converter!</p>
</body>
</html>