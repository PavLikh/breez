<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>FIO</th>
			<th>Birth date</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $user):?>
		<tr>
			<td><?=$user['id'];?></td>
			<td><?=$user['fio'];?></td>
			<td><?=$user['birth_date'];?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>