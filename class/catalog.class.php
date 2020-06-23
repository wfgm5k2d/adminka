<?php
class catalog{
	function getCat($parent)
	{
		include('config.php');
		// Составляем запрос
		$sql = "SELECT * FROM catalog WHERE parent='$parent'";
		$result = mysqli_query($link, $sql);

		// Перебор результата
		$k = 0;
		while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		    $CATALOG[$k] = $record;
		    $k++;
		}
		return $CATALOG;
	}

	function getCatUrl($id)
	{
		include('config.php');
		// Составляем запрос
		$sql = "SELECT url FROM catalog WHERE id='$id'";
		$result = mysqli_query($link, $sql);

		// Перебор результата
		$record = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $record['url'];
	}

	function getCatId($url)
	{
		include('config.php');
		// Составляем запрос
		$sql = "SELECT id FROM catalog WHERE url='$url'";
		$result = mysqli_query($link, $sql);

		// Перебор результата
		$record = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $record['id'];
	}

	function getCatName($url)
	{
		include('config.php');
		// Составляем запрос
		$sql = "SELECT name FROM catalog WHERE url='$url'";
		$result = mysqli_query($link, $sql);

		// Перебор результата
		$record = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $record['name'];
	}
}
?>