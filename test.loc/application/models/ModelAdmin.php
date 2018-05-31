<?php

class ModelAdmin extends Model
{
	public function getCountTable($table)
	{
		$count = null;
		try {
			$count = $this->connect()
			              ->query("SELECT COUNT(*) as count FROM $table")
			              ->fetchColumn();
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return $count;
	}
}