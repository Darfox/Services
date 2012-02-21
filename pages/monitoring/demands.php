<div>
	<h3>Demandes en cours</h3>
	<p></p>
	<div style="width: 90%; margin: 0 auto;">
<?php

$retour_messages=mysql_query('SELECT id, (select name from client where id=t.clientId) as clientName, serverName, serverRole, serverType FROM demandes t WHERE is_active = 0 ORDER BY id DESC');
echo '<table id="listDemands" width="100%">
	<thead>	
		<tr>
			<th>Client</th>
			<th>Serveur</th>
			<th>Role</th>
			<th>Type</th>
			<th></th>
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
					<td style="text-align: center;"><a href="/monitoring/detail/'.$donnees_messages['id'].'"><img src="/images/ico_serverDetail.png" alt="D&eacute;tails" /></a></td>
                </tr>';
}
echo '	</tbody>
	</table>';	
?>
	</div>
</div>