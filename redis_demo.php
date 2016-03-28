
<?php 
			require "predis/autoload.php";
			Predis\Autoloader::register();
			$redis = new Predis\Client(array(
			  "scheme" => "tcp",
			  "host" => "127.0.0.1",
			  "port" => 6379)
			);
			if($redis)
			{
				 ;//echo "Redis connected succesfully.<br/>";
			}
			else
			{
				 echo "Redis Not connected";die;
			}
			echo "<b>working with set and get::</b><br/>";
			echo '1. set user_id and get user_id : ';
			$redis->set('user_id','14');
			echo $redis->get('user_id');
			
			echo "<br/><b>working with list::</b><br/>";
			//"lpush : ";
			$redis->lpush('country', 'BD');
			$redis->lpush('country', 'AU');
			$redis->rpush('country', 'UK');
			echo "2. lpush data lrange() : ";
			$country = $redis->lrange('country',0,-1);
			print_r($country);
			echo "<br/>3. lpush datas llen() : ";
			echo $redis->llen('country');
			$redis->del('country');//erase country from redis
			
			echo "<br/><b>working with hashes::</b>";
			//$key = 'Hanif';
			$redis->hset('Hanif','age',25);
			$redis->hset('Hanif','roll',02);
			echo "<br/>4. hset and hget : ";
			echo $redis->hget('Hanif','age');
			echo $redis->hget('Hanif','roll');
			
			echo "<br/><b>working with set's::</b>";
			echo "<br/>5. sets sadd and smembers : ";
			$key = 'man';
			$redis->sadd($key, 'Kadir');
			$redis->sadd($key, 'Uzzal');
			$man = $redis->smembers($key);
			print_r($man);
	
