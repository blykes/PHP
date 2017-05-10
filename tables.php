<?php
$string = 'word';
$integer = 2;
$bool = TRUE;
$float = 100.2;
?>
<html lang="en-US">
<head>
<title>Table assignment</title>
<style>
table
{
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width 100%;
}

td, th
{

	border: 1px solid black;
	text-align: left;
	//padding: 10px;
}

tr:nth-child(even)
{
	background-color: #dddddd;
}

</style>
</head> 
<body>

<table style="width:10%">
	<tr>
	<th>1</th>
	<th>Type</th>
	<th>Value</th>
	</tr>
<tr>
	<td>1</td>
	<td>string</td>
	<td> <? echo $string; ?></td>
</tr>
<tr>
	<td>1</td>
	<td>integer</td>
	<td> <? echo $integer; ?></td>
</tr>
<tr>
	<td>1</td>
	<td>Boolean</td>
	<td><? echo $bool; ?></td>
</tr>
<tr>
	<td>1</td>
	<td>Float</td>
	<td> <? echo $float; ?></td>
</tr>
</table>

</body>
</html>