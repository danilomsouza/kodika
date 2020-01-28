<?php
if ($_SESSION['login'] != 'adm') {
  header('Location: index.php');
}
