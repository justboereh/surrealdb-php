<?php

namespace jbr\SurrealDB;

class Live extends Emitter {
	protected $id = null;
	protected $db = null;
	protected $sql = null;
	protected $vars = null;

	
	public function __construct($db, $sql, $vars) {
		$this->super();

		$this->db = $db;
		$this->sql = $sql;
		$this->vars = $vars;

		if ($this->db->ready) {
			$this->open();
		}
		
		$this->db.on("opened", function($e) {
			$this->open();
		});

		$this->db.on("closed", function($e) {
			$this->id = null;
		});

		$this->db->on("notify", function($e) {
			if ($e.query === $this->id) {
				switch ($e->action) {
					case 'CREATE':
						return $this->emit("create", $e->results);

					case "UPDATE":
						return this.emit("update", e.result);

					case "DELETE":
						return this.emit("delete", e.result);
				}
			}
		});
    }

	public function kill() {
		if ($this->id === null) return;

		$res = $this->db->kill($this->id);

		$this->id = null;

		return $res;
	}

	public function open() {

		if ($this->id !== null) return;

		return $this->db->query($this->sql, $this->vars)->then(function($res) {
			if ($res[0] && $res[0].result && $res[0].result[0]) {
				$this->id = $res[0].result[0];
			}
		});
	}
}