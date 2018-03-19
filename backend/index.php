<?php 

    require_once 'backend/functions.php';    
    $config=read_config();
    print_r($config);
    $chain=@$_GET['chain'];
    echo "$chain";
    // echo html($chain);
	
	if (strlen($chain))
		$name=@$config[$chain]['name'];
	else
        $name='';
    echo $name;
?>
<head>

<?php 
	if($name=='')
	{	foreach ($config as $chain => $rpc)
			if (isset($rpc['rpchost']))
				echo " <script>window.location.assign('./".$_SESSION['crPage']."?chain=".html($chain)."'); </script>" ;
	}
?>
	
<!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
		<!-- <link rel="stylesheet" href="styles.css"> -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
</head>
</html>
<body>
<?php
	//inportant 1
	if (strlen($chain)) {
		$name=@$config[$chain]['name'];
?>
<?php
		set_multichain_chain($config[$chain]);
		
		switch (@$_GET['page']) {
			case 'label':
			case 'permissions':
			case 'issue':
			case 'update':
			case 'send':
			case 'offer':
			case 'accept':
			case 'create':
			case 'publish':
			case 'view':
			case 'asset-file':
				require_once 'page-'.$_GET['page'].'.php';
				break;
				
			default:
				// require_once 'page-default.php';
				break;
		}
	}
	//  else {
	// 	foreach ($config as $chain => $rpc)
	// 		if (isset($rpc['rpchost']))
	// 	echo '<p class="lead"><a href="./?chain='.html($chain).'">'.html($rpc['name']).'</a><br/>';
	// }
?>
	
		</div>




<?php
	function newAddress(){
		print_r(no_displayed_error_result($getnewaddress, multichain('getnewaddress')));
		echo html($address);


		if (no_displayed_error_result($getaddresses, multichain('getaddresses', true))) {
			$addressmine=array();
		}
			foreach ($getaddresses as $getaddress)
				$addressmine[$getaddress['address']]=$getaddress['ismine'];
			
			$addresspermissions=array();
			
			if (no_displayed_error_result($listpermissions,
				multichain('listpermissions', 'all', implode(',', array_keys($addressmine)))
			))
				foreach ($listpermissions as $listpermission)
					$addresspermissions[$listpermission['address']][$listpermission['type']]=true;
			
			no_displayed_error_result($getmultibalances, multichain('getmultibalances', array(), array(), 0, true));
			
			foreach ($addressmine as $address => $ismine) 
			{
				if (count(@$addresspermissions[$address]))
					$permissions=implode(', ', @array_keys($addresspermissions[$address]));
				else
					$permissions='none';
			$address = array('address' => $address);
			}		
			$_SESSION['uwAddress'] = $address['address'];
			echo "New Address is " . $_SESSION['uwAddress'];
			// echo $ismine ? 'not working' : ' (watch-only)';
		}

		function grantPermissions($from,$to,$permissions){


						$success=no_displayed_error_result($permissiontxid, multichain('grantfrom',
						$from, $to ,$permissions));	
					
					

				// elseif ($_POST['operation']=='revoke')
				// 	$success=no_displayed_error_result($permissiontxid, multichain('revokefrom',
				// 		$_POST['from'], $_POST['to'], implode(',', $permissions)));
						
				// if ($success)
				// 	output_success_text('Permissions successfully changed in transaction '.$permissiontxid);

				// $to=$_POST['to'];

			}

	if (@$_POST['sendasset']) {		
			$success=no_displayed_error_result($sendtxid, multichain('sendassetfrom',
				'1RBXAS3V9VKq48Z167enL2iSngXjdD6KMGqr2H', '19TMMf8r5NBSN5qdz6fK71vjDSkTBrnyKo9nSe', 'vCoin', 50));	
		if ($success)
			output_success_text('Asset successfully sent in transaction '.$sendtxid);
	}
?>


					<!-- <form class="form-horizontal" method="post" action="<?php echo chain_page_url_html($_SESSION['crPage'],$chain)?>"> -->
						<!-- <div class="form-group"> -->
							<!-- <div class="col-xs-12"> -->
								<input class="btn btn-default" name="getnewaddress" type="submit" value="Get new address">
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="form-group"> -->
							<!-- <div class="col-sm-offset-3 col-sm-9"> -->
								<!-- <input class="btn btn-default" type="submit" name="sendasset" value="Send Asset"> -->
							<!-- </div> -->
						<!-- </div> -->
					<!-- </form> -->

</body>
</html>

