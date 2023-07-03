<?php
	$name = $_POST['name'];
	$dat = $_POST['data'];
	$message = $_POST['message'];
	$comm = $_POST['comm'];
	$bank = $_POST['select'];
	$bankk = $_POST['selectt'];
	$type = '~';
	$data = "$name, $dat, $message, $comm, $type\n"; // create a string with the data

	if($bank == 1 and $bankk == 22){
		//Самое главное что общая сумма не меняется, сумма всех счетов!
		//Переводим с первого счёта на второй
		//Общую сумму не меняем, +1 к общему числу транзакций, одна транзакция в json
		//Сначала добавим транзакцию в файл
		$fp = fopen('transaction.txt', 'r');
		$count = file_get_contents('transaction.txt');
		$parsed_count = (int)$count;
		fclose($fp);
		$fp - fopen('transaction.txt', 'w+');
		$parsed_count++;
		fwrite($fp, $parsed_count);
		fclose($fp);
		//Добавляем транзакцию в json
		if(isset($_POST['submit'])){
			$data = array(
				'amount' => $_POST['name'],
				'date' => $_POST['data'],
				'agent' => 'roofart',
				'comm' => $_POST['message'],
				'bank' => 'first to second',
				'type' => 'transfer'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		//Отнимем от первого счёта деньги, сначала в тестовом файле, а затем и в json
		$fp = fopen('sum1.txt', 'r');
		$count = file_get_contents('sum1.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum1.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum1 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum1.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum1.json', json_encode(array()));
		$products[1] = $sum1;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum1.json', $json_data);
		//Теперь добавим эти деньги к второму счёту
		$fp = fopen('sum2.txt', 'r');
		$count = file_get_contents('sum2.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum2.txt', 'w+');
		$sum = $parsed_count + $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum2 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum2.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum2.json', json_encode(array()));
		$products[1] = $sum2;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum2.json', $json_data);
	}

	else if($bank == 1 and $bankk == 33){
		$fp = fopen('transaction.txt', 'r');
		$count = file_get_contents('transaction.txt');
		$parsed_count = (int)$count;
		fclose($fp);
		$fp = fopen('transaction.txt', 'w+');
		$parsed_count++;
		fwrite($fp, $parsed_count);
		fclose($fp);
		if(isset($_POST['submit'])){
			$data = array(
				'amount' => $_POST['name'],
				'date' => $_POST['data'],
				'agent' => 'roofart',
				'comm' => $_POST['message'],
				'bank' => 'first to third',
				'type' => 'transfer'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		$fp = fopen('sum1.txt', 'r');
		$count = file_get_contents('sum1.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum1.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum1 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum1.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum1.json', json_encode(array()));
		$products[1] = $sum1;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum1.json', $json_data);
		//Теперь второй счёт
		$fp = fopen('sum3.txt', 'r');
		$count = file_get_contents('sum3.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum3.txt', 'w+');
		$sum = $parsed_count + $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum3 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum3.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum3.json', json_encode(array()));
		$products[1] = $sum3;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum3.json', $json_data);
	}

	else if ($bank == 2 and $bankk == 11){
		//Отнимает от второго и добавляем к первому
		$fp = fopen('transaction.txt', 'r');
		$count = file_get_contents('transaction.txt');
		$parsed_count = (int)$count;
		fclose($fp);
		$fp = fopen('transaction.txt', 'w+');
		$parsed_count++;
		fwrite($fp, $parsed_count);
		fclose($fp);
		if(isset($_POST['submit'])){
			$data = array(
				'amount' => $_POST['name'],
				'date' => $_POST['data'],
				'agent' => 'roofart',
				'comm' => $_POST['message'],
				'bank' => 'second to first',
				'type' => 'transfer'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		$fp = fopen('sum2.txt', 'r');
		$count = file_get_contents('sum2.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum2.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum2 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum2.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum2.json', json_encode(array()));
		$products[1] = $sum2;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum2.json', $json_data);
		//Добавляем сумму к первому акаунту
		$fp = fopen('sum1.txt', 'r');
		$count = file_get_contents('sum1.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum1.txt', 'w+');
		$sum = $parsed_count + $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum1 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum1.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum1.json', json_encode(array()));
		$products[1] = $sum1;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum1.json', $json_data);
	}

	else if($bank == 2 and $bankk == 33){
		//Отнимаем от второго и добавляем к третьему
		$fp = fopen('transaction.txt', 'r');
		$count = file_get_contents('transaction.txt');
		$parsed_count = (int)$count;
		fclose($fp);
		$fp = fopen('transaction.txt', 'w+');
		$parsed_count++;
		fwrite($fp, $parsed_count);
		fclose($fp);
		if(isset($_POST['submit'])){
			$data = array(
				'amount' => $_POST['name'],
				'date' => $_POST['data'],
				'agent' => 'roofart',
				'comm' => $_POST['message'],
				'bank' => 'second to third',
				'type' => 'transfer'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		$fp = fopen('sum2.txt', 'r');
		$count = file_get_contents('sum2.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum2.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum2 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum2.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum2.json', json_encode(array()));
		$products[1] = $sum2;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum2.json', $json_data);
		//Добавляем к третьему счёту деньги
		$fp = fopen('sum3.txt', 'r');
		$count = file_get_contents('sum3.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum3.txt', 'w+');
		$sum = $parsed_count + $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum3 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum3.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum3.json', json_encode(array()));
		$products[1] = $sum3;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum3.json', $json_data);
	}

	else if($bank == 3 and $bankk == 11){
		//С третьего переводим на первый
		$fp = fopen('transaction.txt', 'r');
		$count = file_get_contents('transaction.txt');
		$parsed_count = (int)$count;
		fclose($fp);
		$fp = fopen('transaction.txt', 'w+');
		$parsed_count++;
		fwrite($fp, $parsed_count);
		fclose($fp);
		if(isset($_POST['submit'])){
			$data = array(
				'amount' => $_POST['name'],
				'date' => $_POST['data'],
				'agent' => 'roofart',
				'comm' => $_POST['message'],
				'bank' => 'third to first',
				'type' => 'transfer'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		//Теперь отнимем от третьего счёта сумму 
		$fp = fopen('sum3.txt', 'r');
		$count = file_get_contents('sum3.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum3.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum3 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum3.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum3.json', json_encode(array()));
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum3.json', $json_data);
		//Теперь добавим деньги к первому счёту
		$fp = fopen('sum1.txt', 'r');
		$count = file_get_contents('sum1.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum1.txt', 'w+');
		$sum = $parsed_count + $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum1 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum1.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum1.json', json_encode(array()));
		$products[1] = $sum1;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum1.json', $json_data);
	}

	else if($bank == 3 and $bankk == 22){
		//С третьего переводим на второй
		$fp = fopen('transaction.txt', 'r');
		$count = file_get_contents('transaction.txt');
		$parsed_count = (int)$count;
		fclose($fp);
		$fp = fopen('transaction.txt', 'w+');
		$parsed_count++;
		fwrite($fp, $parsed_count);
		fclose($fp);
		if(isset($_POST['submit'])){
			$data = array(
				'amount' => $_POST['name'],
				'date' => $_POST['data'],
				'agent' => 'roofart',
				'comm' => $_POST['message'],
				'bank' => 'third to second',
				'type' => 'transfer'
			);
			$json_data = file_get_contents('data.json');
			$products = json_decode($json_data, true);
			$products[$parsed_count] = $data;
			$json_data = json_encode($products, JSON_PRETTY_PRINT);
			file_put_contents('data.json', $json_data);
		}
		//Теперь отнимем от третьего счёта сумму 
		$fp = fopen('sum3.txt', 'r');
		$count = file_get_contents('sum3.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum3.txt', 'w+');
		$sum = $parsed_count - $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum3 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum3.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum3.json', json_encode(array()));
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum3.json', $json_data);
		$fp = fopen('sum2.txt', 'r');
		$count = file_get_contents('sum2.txt');
		$parsed_count = (float)$count;
		fclose($fp);
		$fp = fopen('sum2.txt', 'w+');
		$sum = $parsed_count + $name;
		fwrite($fp, $sum);
		fclose($fp);
		$sum2 = array(
			'all_money' => $sum
		);
		$json_data = file_get_contents('sum2.json');
		$products = json_decode($json_data, true);
		file_put_contents('sum2.json', json_encode(array()));
		$products[1] = $sum2;
		$json_data = json_encode($products, JSON_PRETTY_PRINT);
		file_put_contents('sum2.json', $json_data);
	}
	header('location: ' . $_SERVER['HTTP_REFERER']); // либо явно указать путь к форме
	exit();
?>