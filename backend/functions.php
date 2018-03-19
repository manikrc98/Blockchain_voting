<?php
    include "connection.php";
    include_once "tables.php";
    // include "index.php";

    function login($username,$password){
            global $conn;
           if(isset($_POST['username']) and isset($_POST['password'])){
                // $username = $_POST['username'];
                // $password = $_POST['password'];
               $hash = "$2y$10$";
               $salt = "thisisjustatwentytwo22";
               $hash = $hash . $salt;
               $enc_pass = crypt($password,$hash);
               $query = "SELECT * FROM users WHERE ";
               $query .= "email = '$username' and password = '$enc_pass'";
               $result = $conn->query($query);
               if(!$result){die(('Query Failed') . $conn->error());}
               elseif ($result->num_rows == 1)
               {    
                   
                    // Cookie setting for Remeber ME
                    // ob_start();
                    $expiration = time() + (60*60*24*30*2);
                    $name=$result->fetch_assoc()['name'];
                    setcookie('name',$name,$expiration);     //name,value,expiration
                    // $_SESSION['$userName']=$result->fetch_assoc()['username'];   //not working, should work
                    setcookie('pass',$enc_pass,$expiration);
                    // ob_end_flush();
                   
                    
                    //Session Creation
                    // $_SESSION['$userName']=$result->fetch_assoc()['username'];
                    // echo "Welcome " . $_SESSION['$userName'];
                    // sleep(1);
                    echo "<script>window.location.assign('loginSuccess.php'); </script>";
               }
               else
               {
                   echo "Error: Invalid Credentials!";
                   session_destroy();
               }
           }
           else{
                echo "Error: Please Enter Username and Password";
           }
           $conn->close();
    }


    function rememberme()
    {
        // if(isset($_POST[rm])){
            // $expiration = time() + (60*60*24*30*2);
            // echo "test";
            // setcookie("test","abc",(time()+(60*60*1)));
            // setcookie("name",$_POST['username'],(time() + (60*60*24*30*2)));     //name,value,expiration
            // echo "hii " . $_COOKIE["name"] . " ";
            // setcookie('pass',$_POST['password']);
        // }
    }


    function register(){
        global $conn;
        $username=$_POST['name'];
        $gender = $_POST['gender'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password1=$_POST['password1'];
        $phone=$_POST['phone'];
        $country=$_POST['country'];
        $age = $_POST['age'];
        $interest = $_POST['interest'];

        if($password===$password1)
        {
            mysqli_real_escape_string($conn,$username);
            mysqli_real_escape_string($conn,$gender);
            mysqli_real_escape_string($conn,$password);
            mysqli_real_escape_string($conn,$password1);
            mysqli_real_escape_string($conn,$email);
            mysqli_real_escape_string($conn,$country);
            //Hashing Function
            $hash = "$2y$10$";
            $salt = "thisisjustatwentytwo22";
            $uwaddress = $_SESSION['uwAddress'];
            echo "uw address is ".$uwaddress;
            $hash = $hash . $salt;
            $enc_pass = crypt($password,$hash);
            $querry="insert into users(name,gender,email,password,phone,age,country,uwAddress) values('$username','$gender','$email','$enc_pass',$phone,$age,'$country','$uwaddress')";
            $res = $conn->query($querry);
            $query1 = "select userid from users where email='$email'";
            $result = $conn->query($query1);
            query_test($result);
            $uid = $result->fetch_assoc()['userid'];
            echo "user id is" . $uid;
            foreach($interest as $i){
                echo $i;
                $query2 = "INSERT INTO interest(userid,iName) values($uid,'$i')";
                $result2 = $conn->query($query2);
                query_test($result2);
            }
            if($res && $result && $result2 == true)
            {
                echo "Welcome $username , please Login to continue.";
            }
            else {
                echo "Error Occured " . $conn->error . " please Signup Again with valid details.";
            }
        }
        else
        {
            echo "Password did not match, Please enter the details again.";
        }

        $conn->close();
    }

    function logout()
    {
        echo "<center>Loging Out of " .$_COOKIE['name']  . " 's account</center>";
        $expiration = time() - (60*60*24*30*2);
        setcookie('name','',$expiration);
        setcookie('pass','',$expiration);
        sleep(1.5);
        session_destroy();
        echo " <script>window.location.assign('index.php'); </script>";
    }

    function camp_create($campDd)
    {
        global $conn;
        $campName = $_SESSION['campName'];
        $candNum  = $_SESSION['candNum'];
        $campCat  = $_SESSION['campCat'];
        $candUa   = $_SESSION['candUa'];
        // $campDd   = $_POST['campDd'];
        $campDesc = $_SESSION['campDesc'];
        $querry = "insert into campaign(campName,candNum,campCat,candUa,campDd,campDesc) values ('$campName',$candNum,'$campCat','$candUa','$campDd','$campDesc')";
        $result = $conn->query($querry);
        query_test($result);
        $query = "select campId from campaign where campName = '$campName' and campDd = '$campDd' and campCat = '$campCat' and candUa = '$candUa' and candNum = $candNum";
        $result = $conn->query($query);
        query_test($result);
        $_SESSION['campId'] = $result->fetch_assoc()['campId'];
        echo $result->fetch_assoc()['campId'];
    }

    function cand_ins()
    {
        
    }

    function query_test($result)
    {
        
    }



























    //Json RPC functions copied from function.php of web demo https://github.com/MultiChain/multichain-web-demo

    function read_config()
	{
		$config=array();
		
		$contents=file_get_contents('/var/www/html/multichain-web-demo/config.txt');
		$lines=explode("\n", $contents);
		
		foreach ($lines as $line) {
			$content=explode('#', $line);
			$fields=explode('=', trim($content[0]));
			if (count($fields)==2) {
				if (is_numeric(strpos($fields[0], '.'))) {
					$parts=explode('.', $fields[0]);
					$config[$parts[0]][$parts[1]]=$fields[1];
				} else {
					$config[$fields[0]]=$fields[1];
				}
			}
		}
		
		return $config;
	}
	
	function json_rpc_send($host, $port, $user, $password, $method, $params=array())
	{
		$url='http://'.$host.':'.$port.'/';
				
		$payload=json_encode(array(
			'id' => time(),
			'method' => $method,
			'params' => $params,
		));
		
	//	echo '<PRE>'; print_r($payload); echo '</PRE>';
		
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERPWD, $user.':'.$password);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: '.strlen($payload)
		));
		
		$response=curl_exec($ch);
		
	//	echo '<PRE>'; print_r($response); echo '</PRE>';
		
		$result=json_decode($response, true);
		
		if (!is_array($result)) {
			$info=curl_getinfo($ch);
			$result=array('error' => array(
				'code' => 'HTTP '.$info['http_code'],
				'message' => strip_tags($response).' '.$url
			));
		}
		
		return $result;
	}
	
	function set_multichain_chain($chain)
	{
		global $multichain_chain;
		
		$multichain_chain=$chain;
	}
	
	function multichain($method) // other params read from func_get_args()
	{
		global $multichain_chain;
		
		$args=func_get_args();
		
		return json_rpc_send($multichain_chain['rpchost'], $multichain_chain['rpcport'], $multichain_chain['rpcuser'],
			$multichain_chain['rpcpassword'], $method, array_slice($args, 1));
	}
	
	function output_rpc_error($error)
	{
		echo '<div class="bg-danger" style="padding:1em;">Error: '.html($error['code']).'<br/>'.html($error['message']).'</div>';
	}
	
	function output_success_text($success)
	{
		echo '<div class="bg-success" style="padding:1em;">'.html($success).'</div>';
	}
	
	function no_displayed_error_result(&$result, $response)
	{
		if (is_array($response['error'])) {
			$result=null;
			output_rpc_error($response['error']);
			return false;
		
		} else {
			$result=$response['result'];
			return true;
		}
	}
	
	function html($string)
	{
		return htmlspecialchars($string);
	}
	
	function chain_page_url_html($crPage,$chain, $page=null, $params=array())
	{
		$url='./'.$crPage.'?chain='.$chain;
		
		if (strlen($page))
			$url.='&page='.$page;
			
		foreach ($params as $key => $value)
			$url.='&'.rawurlencode($key).'='.rawurlencode($value);
			
		return html($url);
	}
	
	function array_get_column($array, $key) // see array_column() in recent versions of PHP
	{
		$result=array();
		
		foreach ($array as $index => $element)
			if (array_key_exists($key, $element))
				$result[$index]=$element[$key];
		
		return $result;
	}
	
	function multichain_getinfo()
	{
		global $multichain_getinfo;
		
		if (!is_array($multichain_getinfo))
			no_displayed_error_result($multichain_getinfo, multichain('getinfo'));
		
		return $multichain_getinfo;
	}
	
	function multichain_labels()
	{
		global $multichain_labels;
		
		if (!is_array($multichain_labels)) {
			if (no_displayed_error_result($items, multichain('liststreampublishers', 'root', '*', true, 10000))) {
				$multichain_labels=array();
				foreach ($items as $item)
					$multichain_labels[$item['publisher']]=pack('H*', $item['last']['data']);
			}
		}
		
		return $multichain_labels;
	}
	
	function multichain_max_data_size()
	{
		global $multichain_max_data_size;
		
		if (!isset($multichain_max_data_size))
			if (no_displayed_error_result($params, multichain('getblockchainparams')))
				$multichain_max_data_size=min(
					$params['maximum-block-size']-80-320,
					$params['max-std-tx-size']-320,
					$params['max-std-op-return-size']
				);
		
		return $multichain_max_data_size;
	}	
	
	function format_address_html($address, $local, $labels, $link=null)
	{
		$label=@$labels[$address];
		
		if (strlen($link)) {
			$prefix='<a href="'.html($link).'">';
			$suffix='</a>';
		} else {
			$prefix='';
			$suffix='';
		}
		
		if (isset($label))
			$string=html($label).' ('.$prefix.html($address).$suffix.($local ? ', local' : '').')';
		else
			$string=$prefix.html($address).$suffix.($local ? ' (local)' : '');
			
		return $string;
	}
	
	function string_to_txout_bin($string)
	{
		return ltrim($string, "\x00"); // ensures that first byte 0x00 means it's a file
	}
	
	function file_to_txout_bin($filename, $mimetype, $content)
	{
		return "\x00".$filename."\x00".$mimetype."\x00".$content;
	}
	
	function txout_bin_to_file($data)
	{
		$parts=explode("\x00", $data, 4);
		
		if ( (count($parts)!=4) || ($parts[0]!='') )
			return null;
		
		return array(
			'filename' => $parts[1],
			'mimetype' => $parts[2],
			'content' => $parts[3],
		);
	}
	
	function fileref_to_string($vout, $filename, $mimetype, $filesize)
	{
		return "\x00".$vout."\x00".$filename."\x00".$mimetype."\x00".$filesize;
	}
	
	function string_to_fileref($string)
	{
		$parts=explode("\x00", $string);
		
		if ( (count($parts)!=5) || ($parts[0]!='') )
			return null;
			
		return array(
			'vout' => $parts[1],
			'filename' => $parts[2],
			'mimetype' => $parts[3],
			'filesize' => $parts[4],
		);
	}
?>