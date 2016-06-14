<head>
	
	<?php include("php/function.php");?>
	<style>
	.table_dark {
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
			font-size: 14px;
			width: 100%;
			margin-left:0px;
			margin-top:0px;
			text-align: left;
			cursor:pointer;
			border-collapse: collapse;
			background: #252F48;
			
			}
    .table_dark th {
			color: #EDB749;
			border-bottom: 1px solid #37B5A5;
			padding: 12px 17px;
			}
	.table_dark td {
			color: #CAD4D6;
			border-bottom: 1px solid #37B5A5;
			border-right:1px solid #37B5A5;
			padding: 7px 17px;
			}
	.table_dark tr:last-child td {
			border-bottom: none;
			}
	.table_dark td:last-child {
			border-right: none;
			}
	.table_dark tr:hover td {
			text-decoration: underline;
			}
	</style>
</head>
<body>
<table class="table_dark">
  <tr>
    <th>Номер заявки</th>
    <th>Поезд</th>
    <th>Номер места</th>
    <th>ФИО пользователя</th>
    <th>Дата рождения</th>
	<th>Гражданство</th>
    <th>Серия паспорта</th>
	<th>Дата действия паспорта</th>
	<th>Пол</th>
	<th>Телефон</th>
	<th>email</th>
  </tr>
	<?php $row=allInfa();?>
	<?php foreach ($row as $one): ?>
    <tr>
    <td><?print_r($one["key_zayavka"])?></td>
	<td><?print_r($one["train"])?></td>
	<td><?print_r($one["num_mesta"])?></td>
	<td><?print_r($one["fio"])?></td> 
	<td><?print_r($one["dt_birth"])?></td>
	<td><?print_r($one["grazhd"])?></td>
	<td><?print_r($one["seria_passp"])?></td>
	<td><?print_r($one["deistvuet_do"])?></td>
	<td><?print_r($one["pol"])?></td>
	<td><?print_r($one["telephone"])?></td>
	<td><?print_r($one["email"])?></td>
    </tr>
	<?php endforeach; ?>
  </table>
</body>