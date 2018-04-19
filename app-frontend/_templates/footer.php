
  </div>
</div>
<?php
if(!isset($showCopyright)){
    $showCopyright = true;
}

if ($showCopyright) {
?>
<footer class="container-fluid text-center">
  <p>&copy; <?=date("Y");?> - <?=$name;?></p>
</footer>
<?php
}
?>
</body>
</html>
