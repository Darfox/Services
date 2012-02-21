<div>
	<h3>Liste des serveurs supervis&eacute;s</h3>
	<p></p>
	<div style="width: 90%; margin: 0 auto;">
<?php

$retour_messages=mysql_query('SELECT id, (select name from client where id=t.clientId) as clientName, serverName, serverRole, serverType FROM demandes t WHERE is_active = 1 ORDER BY id DESC');
echo '<table id="listServers" width="100%">
	<thead>	
		<tr>
			<th>Client</th>
			<th>Serveur</th>
			<th>Role</th>
			<th>Type</th>
			<th>D&eacute;tails</th>
		</tr>
	</thead>
	<tbody>';
while($donnees_messages=mysql_fetch_assoc($retour_messages))
{
     echo '		<tr>
					<td>'.$donnees_messages['clientName'].'</td>
					<td>'.$donnees_messages['serverName'].'</td>
					<td>'.$donnees_messages['serverRole'].'</td>
					<td>'.$donnees_messages['serverType'].'</td>
					<td><a href="/monitoring/detail/'.$donnees_messages['id'].'">D&eacute;tails</a></td>
                </tr>';
}
echo '	</tbody>
	</table>';	
?>
	</div>
</div>