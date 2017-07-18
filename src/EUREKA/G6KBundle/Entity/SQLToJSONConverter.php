<?php
/**
The MIT License (MIT)

Copyright (c) 2016 Jacques Archim�de

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is furnished
to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

namespace EUREKA\G6KBundle\Entity;

class SQLToJSONConverter {

	private $parameters = array(
		'database_driver' => 'pdo_sqlite',
		'database_host' => null,
		'database_port' => null,
		'database_name' => null,
		'database_user' => null,
		'database_password' => null,
		'database_path' => null
	);

	private $types = array(
		'sqlite' => array(
			'bigint' => 'integer',
			'blob' => 'string',
			'boolean' => 'boolean',
			'char' => 'string',
			'date' => 'date',
			'datetime' => 'datetime',
			'decimal' => 'number',
			'double' => 'number',
			'int' => 'integer',
			'integer' => 'integer',
			'numeric' => 'number',
			'real' => 'number',
			'string' => 'string',
			'text' => 'string',
			'time' => 'time',
			'varchar' => 'string'
		),
		'mysql' => array(
			'tinyint' => 'integer',
			'smallint' => 'integer',
			'mediumint' => 'integer',
			'int' => 'integer',
			'bigint' => 'integer',
			'decimal' => 'number',
			'numeric' => 'number',
			'float' => 'number',
			'double' => 'number',
			'date' => 'date',
			'datetime' => 'datetime',
			'timestamp' => 'datetime',
			'char' => 'string',
			'varchar' => 'string',
			'blob' => 'string',
			'text' => 'string'
		),
		'pgsl' => array(
			'smallint' => 'integer',
			'integer' => 'integer',
			'bigint' => 'integer',
			'decimal' => 'number',
			'numeric' => 'number',
			'real' => 'number',
			'double precision' => 'number',
			'smallserial' => 'integer',
			'serial' => 'integer',
			'bigserial' => 'integer',
			'money' => 'number',
			'character' => 'string',
			'text' => 'string',
			'bytea' => 'string',
			'timestamp' => 'datetime',
			'date' => 'date',
			'time' => 'time',
			'boolean' => 'boolean',
		)
	);

	private $datasources;
	private $maxId = 0;

	public function __construct($fparameters) {
		$this->parameters = array_merge($this->parameters, $fparameters);
		$this->datasources =  new \SimpleXMLElement(dirname(__DIR__)."/Resources/data/databases/Datasources.xml", LIBXML_NOWARNING, true);
	}

	public function convert($datasource) {
		$database = $this->getDatabase($datasource);
		$dstables = $datasource->xpath("Table");
		$tables = array();
		$data = array();
		foreach ($dstables as $table) {
			$tablename = (string)$table['name'];
			$tableinfos = $this->tableInfos($database, $tablename);
			$dscolumns = $table->xpath("Column");
			$columns = array();
			$required = array();
			foreach ($dscolumns as $column) {
				$columnname = (string)$column['name'];
				$columninfos  = array();
				foreach ($tableinfos as $info) {
					if ($info['name'] == $columnname) {
						$columninfos = $info;
						break;
					}
				}
				if (preg_match('/^\s*(\w+)\s*\((\d+)\)\s*$/', $columninfos['type'], $m)) {
					$type = $this->types[$database->getType()][strtolower($m[1])];
					$length = (int)$m[2];
				} else {
					$type = $this->types[$database->getType()][strtolower($columninfos['type'])];
					$length = 0;
				}
				$title = (string)$column['label'];
				$extra = array();
				if ($columninfos['pk'] != "0") {
					$extra[] = 'primarykey:' . $columninfos['pk'];
					if ($columnname == 'id') {
						$extra[] = 'autoincrement:'."1"; // TODO : calculer maxId en recherchant les donn�es
					}
				}
				$extra['type'] = 'type:' . (string)$column['type'];
				if (count($extra) > 0) {
					$title .= ' [' . implode(', ', $extra) . ']';
				}
				$columns[$columnname] = array(
					'type' => $type,
					'title' => $title,
					'description' => (string)$column->Description
				);
				if ($columninfos['dflt_value'] !== null) {
					$columns[$columnname]['default'] = $columninfos['dflt_value'];
				}
				if ($length > 0) {
					$columns[$columnname]['maxLength'] = $length;
				}
				if ($columninfos['notnull'] == "1") {
					$required[] = $columnname;
				}
			}
			$data[$tablename] = $this->getData($database, $tablename, $columns);
			if ($this->maxId > 0) {
				$columns['id']['title'] = preg_replace("/autoincrement:\d+/", "autoincrement:" . $this->maxId, $columns['id']['title']);
			}
			$tables[$tablename] = array(
				"type" => "array",
				"title" => (string)$table['label'],
				"description" => (string)$table->Description,
				"items" => array(
					"type" => "object",
					"properties" => $columns,
					"required" => $required
				)
			);
		}
		$schema = array(
			'$schema' => 'http://json-schema.org/draft-04/schema#',
			'type' => 'object',
			'title' =>(string)$datasource['name'],
			'description' => (string)$datasource->Description,
			'properties' => $tables,
			'required' => array_keys($tables)
		);
		return array(
			'schema' => $schema, 
			'data' => $data
		);
	}

	protected function getDatabase($datasource, $withDbName = true) {
		$dbid = (int)$datasource['database'];
		$databases = $this->datasources->xpath("/DataSources/Databases/Database[@id='".$dbid."']");
		$dbtype = (string)$databases[0]['type'];
		$dbname = (string)$databases[0]['name'];
		$database = new Database(null, $dbid, $dbtype, $dbname);
		if ((string)$databases[0]['label'] != "") {
			$database->setLabel((string)$databases[0]['label']);
		} else {
			$database->setLabel($dbname);
		}
		if ((string)$databases[0]['host'] != "") {
			$database->setHost((string)$databases[0]['host']);
		}
		if ((string)$databases[0]['port'] != "") {
			$database->setPort((int)$databases[0]['port']);
		}
		if ((string)$databases[0]['user'] != "") {
			$database->setUser((string)$databases[0]['user']);
		}
		if ((string)$databases[0]['password'] != "") {
			$database->setPassword((string)$databases[0]['password']);
		} elseif ((string)$databases[0]['user'] != "") {
			try {
				$user = $this->parameters['database_user'];
				if ((string)$databases[0]['user'] == $user) {
					$database->setPassword($this->parameters['database_password']);
				}
			} catch (\Exception $e) {
			}
		}
		$database->connect($withDbName);
		return $database;
	}

	protected function tableInfos($database, $table) {
		switch ($database->getType()) {
			case 'sqlite':
				$tableinfos = $database->query("PRAGMA table_info('".$table."')");
				break;
			case 'pgsql':
				$tableinfos = $database->query("SELECT ordinal_position as cid, column_name as name, data_type as type, is_nullable, column_default as dflt_value FROM information_schema.columns where table_name = '$table' order by ordinal_position");
				foreach($tableinfos as &$info) {
					$info['notnull'] = $info['is_nullable'] == 'NO' ? 1 : 0;
				}
				break;
			case 'mysql':
			case 'mysqli':
				$dbname = str_replace('-', '_', $database->getName());
				$tableinfos = $database->query("SELECT ordinal_position as cid, column_name as name, data_type as type, is_nullable, column_default as dflt_value, column_key FROM information_schema.columns where table_schema = '$dbname' and table_name = '$table' order by ordinal_position");
				foreach($tableinfos as &$info) {
					$info['notnull'] = $info['is_nullable'] == 'NO' ? 1 : 0;
					$info['pk'] = $info['column_key'] == 'PRI' ? 1 : 0;
				}
				break;
			default:
				$tableinfos = null;
		}
		return $tableinfos;
	}

	protected function getData($database, $table, &$schema) {
		$query = "SELECT * FROM $table";
		$result = $database->query($query);
		$rows = array();
		$this->maxId = 0;
		foreach ($result as $resultrow) {
			$row = array();
			foreach ($resultrow as $column => $value) {
				$type = "";
				$g6ktype = "";
				foreach ($schema as $col => $props) {
					if (strcasecmp($col, $column) == 0) {
						$type = $props['type'];
						$column = $col;
						if (preg_match("/type:([^,\]]+)/", $props['title'], $m)) {
							$g6ktype = $m[1];
						}
						break;
					}
				}
				if ($type == 'integer' && $g6ktype != 'date') {
					if (!is_int($value)) {
						$value = (int)$value;
					}
				} elseif ($type == 'number') {
					if (!is_float($value)) {
						$value = (float)$value;
					}
				} elseif ($type == 'boolean') {
					if (!is_bool($value)) {
						$value = (bool)$value;
					}
				}
				if ($column == 'id' && $type == 'integer') {
					if ($value > $this->maxId) {
						 $this->maxId = $value;
					}
				}
				$row[$column] = $value;
			}
			$rows[] = $row;
		}
		return $rows;
	}

}
?>