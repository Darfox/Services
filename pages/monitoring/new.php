<div style="display: clear;">
	<?php
	
	require_once ('functions/jformer.php');
	
	function getClientsList()
	{
		$sql = "SELECT * FROM client";
		$req = mysql_query($sql);
		$clients[] = array('value' => '', 'label' => ' - - - ', 'disabled' => true, 'selected' => true);
		while($data = mysql_fetch_assoc($req))
		{
			$clients[] = array('value' => $data['id'], 'label' => $data['name']);
		}
		return $clients;
	}
	
    $addForm = new JFormer('addForm', array(
		'submitButtonText' => 'Envoyer',
		'submitProcessingButtonText' => 'Envois en cours...'
	));
	
	// Pages
	$Page1 = new JFormPage('Page1', array(
		'title' => 'Serveurs',
	));
	$Page2 = new JFormPage('Page2', array(
		'title' => 'Basique'
	));
	$Page3 = new JFormPage('Page3', array(
		'title' => 'Options'
	));
	$PageMaintenance = new JFormPage('PageMaintenance', array(
		'title' => 'Maintenance'
	));
	$PageComment = new JFormPage('PageComment', array(
		'title' => 'Commentaires'
	));
	
	// Sections 
	$section1 = new JFormSection('Section1', array(
		'instanceOptions' => array(
			'max' => 3,
			'addButtonText' => 'Ajouter',
			'removeButtonText' => 'Supprimer',
		)
    ));
	$section2 = new JFormSection('Section2', array());
	$section3 = new JFormSection('Section3', array());
	$sectionMaintenance = new JFormSection('SectionMaintenance', array());
	$sectionComment = new JFormSection('SectionComment', array());

	$section1->addJFormComponentArray(array(
        new JFormComponentSingleLineText('serverName', 'Nom du serveur:', array(
			'width' => 'medium',
            'validationOptions' => array('required'),
        )),
        new JFormComponentSingleLineText('serverAddress', 'Adresse du serveur:', array(
			'width' => 'medium',
            'validationOptions' => array('required'),
        )),
    ));
	
    $section2->addJFormComponentArray(array(
		new JFormComponentDropDown('client', 'Client:', getClientsList(),
			array('validationOptions' => array('required'))
		),
        new JFormComponentSingleLineText('serverRole', 'Role du serveur:', array(
			'width' => 'long',
            'validationOptions' => array('required'),
        )),
		new JFormComponentDropDown('serverType', 'Type:', array(
			array('value' => '', 'label' => ' - - - ', 'disabled' => true, 'selected' => true),
			array('value' => 'windows', 'label' => 'Windows'),
			array('value' => 'linux', 'label' => 'Linux')),
			array('validationOptions' => array('required'))
		),
		new JFormComponentMultipleChoice('basicMonit', 'Options:', array(
			array('value' => 'basic', 'label' => 'Moniteurs basiques', 'tip' => '<p>CPU, Mémoire, Disques</p>'),
			array('value' => 'AD', 'label' => 'Active Directory'),
			array('value' => 'DNS', 'label' => 'DNS'),
			array('value' => 'DHCP', 'label' => 'DHCP')
		))
	));
	$section3->addJFormComponentArray(array(
		new JFormComponentDropDown('serverAntiVir', 'Anti-Virus:', array(
			array('value' => '', 'label' => 'Aucun', 'disabled' => true, 'selected' => true),
			array('value' => 'symantec', 'label' => 'Symantec'),
			array('value' => 'trend', 'label' => 'Trend Micro'),
			array('value' => 'autre', 'label' => 'Autre'))
		),
		new JFormComponentDropDown('serverBackup', 'Sauvegarde:', array(
			array('value' => '', 'label' => 'Aucun', 'disabled' => true, 'selected' => true),
			array('value' => 'netvault', 'label' => 'NetVault'),
			array('value' => 'arcserv', 'label' => 'ArcServ'))
		),
		new JFormComponentDropDown('serverDB', 'Base de données:', array(
			array('value' => '', 'label' => 'Aucune', 'selected' => true),
			array('value' => 'MsSQL', 'label' => 'MsSQL'),
			array('value' => 'MySQL', 'label' => 'MySQL'),
			array('value' => 'Oracle', 'label' => 'Oracle'))
			//array('multipleChoiceType' => 'radio')
		),
		new JFormComponentDropDown('serverMail', 'Messagerie:', array(
			array('value' => '', 'label' => 'Aucun', 'disabled' => true, 'selected' => true),
			array('value' => 'Exchange', 'label' => 'Exchange'),
			array('value' => 'Domino', 'label' => 'Domino'),
			array('value' => 'Zimbra', 'label' => 'Zimbra'))
			//array('multipleChoiceType' => 'radio')
		)
	));
	$sectionMaintenance->addJFormComponentArray(array(
        
    ));
	$sectionComment->addJFormComponentArray(array(
        new JFormComponentTextArea('comment', 'Commentaires:', array(
            'width' => 'longest',
            'height' => 'medium'
        )),
    ));
	
    $Page1->addJFormSection($section1);
    $Page2->addJFormSection($section2);
    $Page3->addJFormSection($section3);
    $PageMaintenance->addJFormSection($sectionMaintenance);
    $PageComment->addJFormSection($sectionComment);
	
	$addForm->addJFormPage($Page1);
	$addForm->addJFormPage($Page2);
	$addForm->addJFormPage($Page3);
	$addForm->addJFormPage($PageMaintenance);
	$addForm->addJFormPage($PageComment);

    // Set the function for a successful form submission
    function onSubmit($formValues) {	
		
		$basicMonit = (in_array('basic',$formValues->Page2->Section2->basicMonit)) ? 1 : 0;
		$monitAD = (in_array('AD',$formValues->Page2->Section2->basicMonit)) ? 1 : 0;
		$monitDNS = (in_array('DNS',$formValues->Page2->Section2->basicMonit)) ? 1 : 0;
		$monitDHCP = (in_array('DHCP',$formValues->Page2->Section2->basicMonit)) ? 1 : 0;
		
		if(is_array($formValues->Page1->Section1))
		{
			foreach ($formValues->Page1->Section1 as $instance)
			{
				$sql = "INSERT INTO `tango`.`demandes` (`id`, `clientId`, `serverName`, `serverAddress`, `serverRole`, `serverType`, `monitBasic`, `monitAntiVir`, `monitBackup`, `monitAD`, `monitDHCP`, `monitDNS`, `monitDB`, `monitMail`, `comment`, `is_active`) ";
				$sql .= "VALUES (
					NULL, 
					'".$formValues->Page2->Section2->client."',
					'".$instance->serverName."',
					'".$instance->serverAddress."',
					'".$formValues->Page2->Section2->serverRole."',
					'".$formValues->Page2->Section2->serverType."',
					'".$basicMonit."',
					'".$formValues->Page3->Section3->serverAntiVir."',
					'".$formValues->Page3->Section3->serverBackup."',
					'".$monitAD."',
					'".$monitDHCP."',
					'".$monitDNS."',
					'".$formValues->Page3->Section3->serverDB."',
					'".$formValues->Page3->Section3->serverMail."',
					'".$formValues->PageComment->SectionComment->comment."',
					0
				);";
				mysql_query($sql);
			}
		}
		else
		{
			$sql = "INSERT INTO `tango`.`demandes` (`id`, `clientId`, `serverName`, `serverAddress`, `serverRole`, `serverType`, `monitBasic`, `monitAntiVir`, `monitBackup`, `monitAD`, `monitDHCP`, `monitDNS`, `monitDB`, `monitMail`, `comment`, `is_active`) ";
			$sql .= "VALUES (
				NULL, 
				'".$formValues->Page2->Section2->client."',
				'".$formValues->Page1->Section1->serverName."',
				'".$formValues->Page1->Section1->serverAddress."',
				'".$formValues->Page2->Section2->serverRole."',
				'".$formValues->Page2->Section2->serverType."',
				'".$basicMonit."',
				'".$formValues->Page3->Section3->serverAntiVir."',
				'".$formValues->Page3->Section3->serverBackup."',
				'".$monitAD."',
				'".$monitDHCP."',
				'".$monitDNS."',
				'".$formValues->Page3->Section3->serverDB."',
				'".$formValues->Page3->Section3->serverMail."',
				'".$formValues->PageComment->SectionComment->comment."',
				0
			);";
			mysql_query($sql);
		}
		
		$return['successPageHtml'] = '<h1 style="margin-bottom: .5em;">Votre demande a bien ete prise en compte</h1>';
		
        return $return;
    }
	$addForm->processRequest();

	?>
</div>