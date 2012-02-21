<ul id="menu">	
	<li><a href="/">Accueil</a><!-- Begin Home Item -->
    <li><a href="/helpdesk" class="drop">Assistance</a><!-- Begin 5 columns Item -->
    
        <div class="dropdown_5columns"><!-- Begin 5 columns container -->
        
            <div class="col_5">
                <h2>This is an example of a large container with 5 columns</h2>
            </div>
            
            <div class="col_1">
                <p class="black_box">This is a dark grey box text. Fusce in metus at enim porta lacinia vitae a arcu. Sed sed lacus nulla mollis porta quis.</p>
            </div>
            
            <div class="col_1">
                <p>Phasellus vitae sapien ac leo mollis porta quis sit amet nisi. Mauris hendrerit, metus cursus accumsan tincidunt.</p>
            </div>
            
            <div class="col_1">
                <p class="italic">This is a sample of an italic text. Consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi porta quis sit amet.</p>
            </div>
            
            <div class="col_1">
                <p>Curabitur euismod gravida ante nec commodo. Nunc dolor nulla, semper in ultricies vitae, vulputate porttitor neque.</p>
            </div>
            
            <div class="col_1">
                <p class="strong">This is a sample of a bold text. Aliquam sodales nisi nec felis hendrerit ac eleifend lectus feugiat scelerisque.</p>
            </div>
        
            <div class="col_5">
                <h2>Here is some content with side images</h2>
            </div>
           
            <div class="col_3">
            
                <img src="img/01.jpg" width="70" height="70" class="img_left imgshadow" alt="" />
                <p>Maecenas eget eros lorem, nec pellentesque lacus. Aenean dui orci, rhoncus sit amet tristique eu, tristique sed odio. Praesent ut interdum elit. Sed in sem mauris. Aenean a commodo mi. Praesent augue lacus.<a href="#">Read more...</a></p>
        
                <img src="img/02.jpg" width="70" height="70" class="img_left imgshadow" alt="" />
                <p>Aliquam elementum felis quis felis consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi. Aliquam pretium mollis fringilla. Nunc in leo urna, eget varius metus. Aliquam sodales nisi.<a href="#">Read more...</a></p>
            
            </div>
            
            <div class="col_2">
            
                <p class="black_box">This is a black box, you can use it to highligh some content. Sed sed lacus nulla, et lacinia risus. Phasellus vitae sapien ac leo mollis porta quis sit amet nisi. Mauris hendrerit, metus cursus accumsan tincidunt.Quisque vestibulum nisi non nunc blandit placerat. Mauris facilisis, risus ut lobortis posuere, diam lacus congue lorem, ut condimentum ligula est vel orci. Donec interdum lacus at velit varius gravida. Nulla ipsum risus.</p>
            
            </div>
        
        </div><!-- End 5 columns container -->
    
    </li><!-- End 5 columns Item -->

    <li><a href="/monitoring" class="drop">Supervision</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_supervision"><!-- Begin 4 columns container -->
        
            <div class="col_sup">
                <h2>Supervision Tango/04</h2>
            </div>
            
            <div class="col_2">
                <ul>
                    <li style="width: 100%;"><a href="/monitoring/new"><img src="/images/ico_newDemand.png" alt="" align="absmiddle" style="margin-right: 5px;" />Nouvelle demande</a></li>
                    <li style="width: 100%;"><a href="/monitoring/demands"><img src="/images/ico_hourglass.png" alt="" align="absmiddle" style="margin-right: 5px;" />Demandes en cours</a></li>
                    <li style="width: 100%;"><a href="/monitoring/list"><img src="/images/ico_listServers.png" alt="" align="absmiddle" style="margin-right: 5px;" />Liste des serveurs</a></li>
                </ul>   
                 
            </div>
    
            <div class="col_2 black_box">
				Serveurs supervis&eacute;s: <b><?=getAllServ()?></b><br/>
				Nouvelles demandes: <b><?=getAllDemands()?></b><br/>
				Nombre de clients: <b><?=getAllClients()?></b>
            </div>
            
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->

	<li class="menu_right"><a href="/account" class="drop">Mon compte</a>
		<div class="dropdown_1column align_right">
			<div class="col_1">
                <h2>Damien Talec</h2>
            </div>
            
            <div class="col_1">
                <ul>
                    <li><a href="/settings">Param&egrave;tres</a></li>
                    <li><a href="/admin">Administration</a></li>
                    <li><a href="#" id="logoutLink">D&eacute;connexion</a></li>
                </ul>   
                 
            </div>
		</div>
        
	</li>
</ul>