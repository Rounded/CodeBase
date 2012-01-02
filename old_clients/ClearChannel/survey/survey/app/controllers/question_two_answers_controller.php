<?php
class QuestionTwoAnswersController extends AppController {

	var $name = 'QuestionTwoAnswers';
/*
	function index() {
		$this->QuestionTwoAnswer->recursive = 0;
		$this->set('questionTwoAnswers', $this->paginate());
	}

	function add() {
		if (!empty($this->data)) {
			$this->QuestionTwoAnswer->create();
			if ($this->QuestionTwoAnswer->save($this->data)) {
				$this->Session->setFlash(__('The question two answer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question two answer could not be saved. Please, try again.', true));
			}
		}
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid question two answer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('questionTwoAnswer', $this->QuestionTwoAnswer->read(null, $id));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid question two answer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->QuestionTwoAnswer->save($this->data)) {
				$this->Session->setFlash(__('The question two answer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question two answer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->QuestionTwoAnswer->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for question two answer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->QuestionTwoAnswer->delete($id)) {
			$this->Session->setFlash(__('Question two answer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Question two answer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	*/
}
