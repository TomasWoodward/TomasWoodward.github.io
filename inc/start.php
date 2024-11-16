<?php
    if(!empty($_SESSION["theme"])){
        $currentTheme = $_SESSION["theme"];
    } else {
        $currentTheme = "default";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$htmlTitle?></title>
    <link rel="stylesheet" href="css/default/global.css" media="screen" title="default" <?=$currentTheme === "default" ? "" : "disabled"?>>
    <link rel="stylesheet" href="css/default/<?=$cssDefault?>.css" title="default" <?=$currentTheme === "default" ? "" : "disabled"?>>
    <link rel="stylesheet" title="dark theme" <?=$currentTheme === "dark theme" ? "" : "disabled"?> href="css/darkTheme/<?=$cssOscuro?>.css">
    <link rel="stylesheet" title="high contrast"  <?=$currentTheme === "high contrast" ? "" : "disabled"?> href="css/highContrast/<?=$cssContraste?>.css">
    <link rel="stylesheet" title="big Font"  <?=$currentTheme === "big Font" ? "" : "disabled"?> href="css/textoGrande/<?=$cssGrande?>.css">
    <link rel="stylesheet" title="big Font + high contrast" <?=$currentTheme === "big Font + high contrast" ? "" : "disabled"?> href="css/highBig/<?=$cssGrandeContraste?>.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <?=$scripts1?>
</head>
<body>