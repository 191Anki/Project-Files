class FlashcardsController extends AppController {

	//Replace links with domain link?
	public $helpers = array('Html', 'Form'); //Unsure of what this is
	public $components = array('Session');
	public $validate = array('user name' => array('rule' => 'notEmpty'), 'front' => array('rule' => 'notEmpty'),
				'back' => array('rule' => 'notEmpty'));

	//This is for index, to show all the listings of flashcards or decks
	// Decks index not finished, still need to figure out if decks will be seen as models
	public function index() {
		$this->set('flashcards', $this->Flashcards->find('all');
		}

	//See flashcards
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(_('Invalid flashcard'));
		}

		$flashcard = $this->Flashcards->findbyUserName($id);//Searching by user name
		if (!$flashcard) {
			throw new NotFoundException(_('Invalid flashcard'));
		}
		$this->set('flashcards', $flashcard);
	}

	
	//Adding a flashcard
	//May not be used since not created, but uploaded
	public function add() {
		if ($this->request->is('flashcard')) {
		    $this->Flashcards->create();
		    if ($this->Flashcards->save($this->request->data)) {
		    $this->Session->setFlash(_('Your flashcard has been saved.'));
		    return $this->redirect(array('action' => ; 'index'));
		    }
		    $this->Session->setFlash(_('Unable to add your flashcard.'));
		}
	}
	
	//Delete function of flashcards
	public function delete($id) {
		if ($this->request->is('get')); {
			throw new MethodNotAllowedException();
		}

	if ($this->Flashcard->delete($id)) {
	    $this->Session->setFlash(_('The flashcard has been deleted.', h($id)));
	    return $this->redirect(array('action' => 'index'));
		}
	
	}

	//Download function
	public function download($id) {
    	$path = $this->YourModel->aMagicFunctionThatReturnsThePathToYourFile($id);
    	$this->response->file($path, array(
        		'download' => true,
        		'name' => 'the name of the file as it should appear on the client\'s computer',
    	));
    	return $this->response;
}
}