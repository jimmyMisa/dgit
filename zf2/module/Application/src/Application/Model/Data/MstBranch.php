<?php

namespace Application\Model\Data;

class MstBranch extends TableModel
{
	protected $name = 'mst_branch';

	public function getRecord($id = null)
	{
		$rowset = null;

		if($id != null) {
			$where = array(
				'id' => $id,
			);
			$rowset = $this->select($where);
		}else {
			$rowset = $this->select();
		}
		
		return $rowset;
	}
	public function updateRecord($data)
	{
		$rowset = null;
		$id=null;
		if(isset($data['id'])){
			$id=$data['id'];
		}
		if($id != null) {
			$where = $data;
			$rowset = $this->insert($where);
			$this->tableGateway->insert($data);
		}else {
			$rowset = $this->select();
		}
		
		return $rowset;
		
		
		
	}

}