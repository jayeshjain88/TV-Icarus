<!DOCTYPE html>
<html lang="en">
<head>
  <title> {$title}: {$pagetitle} </title>
  <meta charset="utf-8">
  <meta name="robots" content="all,noodp,noydir">
  <meta name="title" content="{$pagetitle}">
  <meta name="description" content="{$description}">
  <meta name="keywords" content="{$keywords}">
  <link rel="canonical" href="{$current}">
  <link rel="stylesheet" href="{$base}static/style.css">
  <link rel="icon" type="image/png" href="{$base}static/images/fav.png">
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
<div id="wrapper">
  <div id="header">
    <div id="gatop">
      <!-- Your own ad placement in here if desired. -->
    </div> <!--#gatop-->
    <a href="{$base}" id="logo"> </a>
    <h1> {$title} </h1>
    <h2> {$tagline} </h2>
  </div> <!--#header-->
  <div id="menu">
    <ul>
      <li> <a href="{$base}news">News</a> </li>
      <li> <a href="{$base}guide">Guide</a> </li>
      <li> <a href="{$base}shows">Shows</a> </li>
    </ul>
    <p class="right"> <form action="{$base}search#" method="post" id="search">
      <p class="right"> <input type="text" name="show" maxlength="50">
      <input type="submit" value="Search"> </p>
    </form> <!--search-->
    <span> {$datetime} </span> </p>
  </div> <!--#menu-->
<div id="page">