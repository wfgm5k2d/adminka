<?php
class items{
	function getItems($parent)
	{
		include('config.php');
		// Составляем запрос
		$sql = "SELECT * FROM item WHERE parent='$parent'";
		$result = mysqli_query($link, $sql);

		// Перебор результата
		$k = 0;
		while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		    $ITEM[$k] = $record;
		    $k++;
		}
		return $ITEM;
	}
	function getItemsFull()
	{
		include('config.php');
		// Составляем запрос
		$sql = "SELECT * FROM item";
		$result = mysqli_query($link, $sql);

		// Перебор результата
		$k = 0;
		while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		    $ITEM[$k] = $record;
		    $k++;
		}
		return $ITEM;
	}

	function getItemsId($id)
	{
		include('config.php');
		// Составляем запрос
		$sql = "SELECT * FROM item WHERE id='$id'";
		$result = mysqli_query($link, $sql);

		// Перебор результата
		$k = 0;
		while($record = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
		    $ITEM[$k] = $record;
		    $k++;
		}
		return $ITEM;
	}
}
?>