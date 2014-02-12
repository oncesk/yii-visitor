<?php
class ElementBehaviour extends CModelBehavior {

	/**
	 * @param VisitorInterface $visitor
	 */
	public function accept(VisitorInterface $visitor) {
		$method = 'visit' . get_class($this->getOwner());
		if (method_exists($visitor, $method)) {
			$visitor->$method($this->getOwner());
		} else {
			$visitor->visit($this->getOwner());
		}
	}
}