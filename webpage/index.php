<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		<div id="listarea">
			<ul id="musiclist">
                    <?php
                    $files = glob("songs/*.mp3");
                    foreach ($files as $file) {
                    $filename = basename($file);
                    ?>
                <li class="mp3item">
                <p><a href="<?= $file ?>"><?= $filename ?></a>
                    <?php

              $size=filesize(trim($file));
              if($size <1023){
                $size= round($size, 2);
                print(" (" . $size . "b)");
              }
              elseif ($size>1023 && $size <1048575){
                $size/=1024;
                $size=round($size, 2);
                print(" (" . $size . "Kb)");
              }
              elseif ($size>1048576){
                $size=$size/pow(1024, 2);
                $size=round($size, 2);
                print(" (" . $size . "Mb)");
          }?>
                </li>
                    <?php } ?>
                <?php
                $files = glob("songs/*.txt");
               foreach ($files as $file) {
                $filename = basename($file);?>
                <li class="playlistitem">
                    <p><a href="<?= $file ?>"><?= $filename ?></a></p>
                    <?php } ?>
                </li>
			</ul>
		</div>
	</body>
</html>

