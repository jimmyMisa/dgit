<?php

namespace Application\Model\Data;

class MstArea extends TableModel
{
	protected $name = 'mst_area';

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

}