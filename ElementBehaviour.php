<?php
class ElementBehaviour extends CModelBehavior {

	/**
	 * @param VisitorInterface $visitor
	 *
	 * @return mixed
	 */
	public function accept(VisitorInterface $visitor) {
		$method = 'visit' . get_class($this->getOwner());
		if (method_exists($visitor, $method)) {
			return $visitor->$method($this->getOwner());
		} else {
			return $visitor->visit($this->getOwner());
		}
	}
}