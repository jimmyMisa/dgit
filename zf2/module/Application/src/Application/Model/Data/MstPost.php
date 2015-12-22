<?php

namespace Application\Model\Data;

class MstPost extends TableModel
{
	protected $name = 'mst_post';

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