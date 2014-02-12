<?php
interface VisitorInterface {

	/**
	 * @param CModel $model
	 *
	 * @return mixed
	 */
	public function visit(CModel $model);
}