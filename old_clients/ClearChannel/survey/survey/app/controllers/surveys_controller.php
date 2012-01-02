<?php
class SurveysController extends AppController {

	var $name = 'Surveys';
	
	function add() {
		if (!empty($this->data)) {
			
			if($this->data['Survey']['q3_custom'] != "") {
				$this->data['Survey']['q3'] = $this->data['Survey']['q3_custom'];
			}

			if($this->data['Survey']['q4_custom'] != "") {
				$this->data['Survey']['q4'] = $this->data['Survey']['q4_custom'];
			}
					
			$this->data['Survey']['q2_1'] = "";
			$this->data['Survey']['q2_2'] = "";
			$this->data['Survey']['q2_3'] = "";
		
			for($i=1; $i<8; $i++) { 
				if($this->data['Survey']['q2_a'.$i] == "1") {
					$this->data['Survey']['q2_1'] = $i;
				}
				if($this->data['Survey']['q2_a'.$i] == "2") {
					$this->data['Survey']['q2_2'] = $i;
				}
				if($this->data['Survey']['q2_a'.$i] == "3") {
					$this->data['Survey']['q2_3'] = $i;
				}		
			}
			
			unset($this->data['Survey']['q2_a1']);				
			unset($this->data['Survey']['q2_a2']);				
			unset($this->data['Survey']['q2_a3']);				
			unset($this->data['Survey']['q2_a4']);				
			unset($this->data['Survey']['q2_a5']);				
			unset($this->data['Survey']['q2_a6']);				
			unset($this->data['Survey']['q2_a7']);				
			unset($this->data['Survey']['q3_custom']);
			unset($this->data['Survey']['q4_custom']);	
			
											
			$this->data['Survey']['ip'] = $_SERVER['REMOTE_ADDR'];
			
			$this->Survey->create();
			if ($this->Survey->save($this->data)) {
				$this->redirect(array('action' => 'thankyou'));
				
			} else {
				$this->Session->setFlash(__('There has been an error saving your survey. Please, try again.', true));
			}
		}
	}
	
	function thankyou() {
		
	}

/*
	function index() {
		$this->Survey->recursive = 0;
		$this->set('surveys', $this->paginate());
	
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for survey', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Survey->delete($id)) {
			$this->Session->setFlash(__('Survey deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Survey was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid survey', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('survey', $this->Survey->read(null, $id));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid survey', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Survey->save($this->data)) {
				$this->Session->setFlash(__('The survey has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Survey->read(null, $id);
		}
	}
*/
	
}
